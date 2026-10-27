<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

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
 try{
    $response = Http::timeout(15)
    ->retry(2, 1000, throw: false)
    ->withHeaders(['x-goog-api-key' => $key])
    ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
        'contents' => [['parts' => [['text' => $prompt]]]],
 
    ]);
 } catch (\Illuminate\Http\Client\ConnectionException $e) {
    Log::warning('Gemini timed out', ['error' => $e->getMessage()]);
    return null;
}
    if ($response->failed()) {
    Log::warning('Gemini request failed', ['status' => $response->status(), 'body' => $response->body()]);
    return null;
}

$text = $response->json('candidates.0.content.parts.0.text');

$data = json_decode((String) $text, true);
if(! is_array($data)){
    Log::warning('Gemini returned non-JSON', ['text' => $text]);
    return null;
}
return $data;
    }
}