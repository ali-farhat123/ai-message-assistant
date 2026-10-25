<?php

namespace App\Services;

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
    $response = Http::timeout(60)
    ->retry(3, 2000, throw: false)
    ->withHeaders(['x-goog-api-key' => $key])
    ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
        'contents' => [['parts' => [['text' => $prompt]]]],
    ]);
    if ($response->failed()) {
    return null;
}

$text = $response->json('candidates.0.content.parts.0.text');

$data = json_decode((String) $text, true);
if(! is_array($data)){
    return null;
}
return $data;
    }
}