# AI Message Assistant

A Laravel web application that helps support teams handle customer messages.
Paste a customer message, and the app uses the Gemini AI API to classify it,
set its priority, summarize it, and suggest a polite reply.

## Features

- User registration and login (Laravel Breeze)
- Each user sees only their own messages
- Paste a customer message and save it
- AI analysis with Gemini: category (complaint / inquiry / purchase), priority (urgent / normal), one-line summary, and a suggested reply
- AI output is validated before saving, so unexpected values never reach the database
- If the AI service is slow or down, the message is still saved without analysis and the app keeps working

## Tech Stack

- PHP 8.2 and Laravel 12
- SQLite
- Blade templates with plain CSS
- Gemini API (called with Laravel's HTTP client)

## Setup

```bash
git clone https://github.com/ali-farhat123/ai-message-assistant.git
cd ai-message-assistant
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

Add your Gemini API key and model name to `.env`:

```
GEMINI_API_KEY=your_key_here
GEMINI_MODEL=gemini-3.5-flash-lite
```

Then run:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000 and register an account.

## How it works

The `MessageAnalyzer` service (`app/Services/MessageAnalyzer.php`) sends the message to Gemini and asks for JSON. It handles timeouts and errors, cleans the response, and returns an array. The controller only saves values that match the allowed options.