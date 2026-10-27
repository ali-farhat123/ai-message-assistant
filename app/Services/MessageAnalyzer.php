<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MessageAnalyzer
{
    public function analyze(string $content): ?array
    {
        $key = config('services.gemini.key');
        $model = config('services.gemini.model');

        $prompt = "Analyze this customer message and reply with JSON only. "
            . "Use these keys: category (complaint, inquiry, or purchase), "
            . "priority (urgent or normal), summary (one short sentence), "
            . "suggested_reply (a polite reply).\n\nMessage: " . $content;

        try {
            $response = Http::timeout(15)
                ->retry(2, 1000, throw: false)
                ->withHeaders(['x-goog-api-key' => $key])
                ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
                    'contents' => [['parts' => [['text' => $prompt]]]],
                    'generationConfig' => ['responseMimeType' => 'application/json'],
                ]);
        } catch (ConnectionException $e) {
            Log::warning('Gemini timed out', ['error' => $e->getMessage()]);
            return null;
        }

        if ($response->failed()) {
            Log::warning('Gemini request failed', ['status' => $response->status()]);
            return null;
        }

        $text = (string) $response->json('candidates.0.content.parts.0.text');
        $text = preg_replace('/^```(?:json)?\s*|\s*```$/i', '', trim($text));

        $data = json_decode($text, true);

        if (! is_array($data)) {
            Log::warning('Gemini returned non-JSON', ['text' => substr($text, 0, 300)]);
            return null;
        }

        return $data;
    }
}