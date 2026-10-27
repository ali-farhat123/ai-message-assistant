<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Message</title>
    <style>
        :root {
            --main: #7c3aed;
            --main-dark: #5b21b6;
            --accent: #ec4899;
            --bg1: #eef2ff;
            --bg2: #fce7f3;
        }
        body { font-family: system-ui, sans-serif; background: linear-gradient(135deg, var(--bg1), var(--bg2)); min-height: 100vh; margin: 0; padding: 40px 16px; color: #1f2937; }
        .card { max-width: 560px; margin: 0 auto; background: #fff; border-radius: 16px; box-shadow: 0 10px 30px rgba(124,58,237,.2); overflow: hidden; }
        .head { background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; padding: 24px 28px; }
        h1 { margin: 0 0 4px; font-size: 24px; }
        .sub { margin: 0; font-size: 14px; opacity: .9; }
        .body { padding: 28px; }
        textarea { width: 100%; height: 160px; padding: 12px; border: 2px solid #e5e7eb; border-radius: 10px; font: inherit; box-sizing: border-box; resize: vertical; }
        textarea:focus { outline: none; border-color: var(--main); box-shadow: 0 0 0 3px rgba(124,58,237,.2); }
        .error { color: #dc2626; background: #fee2e2; padding: 8px 12px; border-radius: 6px; font-size: 14px; margin: 10px 0 0; }
        button { margin-top: 16px; background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; border: 0; padding: 11px 24px; border-radius: 999px; font-size: 15px; font-weight: 600; cursor: pointer; }
        button:hover { background: linear-gradient(90deg, var(--main-dark), var(--accent)); }
        button:disabled { background: #9ca3af; cursor: wait; }
        a { color: var(--main); text-decoration: none; margin-left: 14px; font-size: 14px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="card">
        <div class="head">
            <h1>New Message</h1>
            <p class="sub">Paste a customer message. The AI will classify and summarize it.</p>
        </div>

        <div class="body">
            <form method="POST" action="/messages" onsubmit="this.querySelector('button').disabled = true; this.querySelector('button').textContent = 'Analyzing...';">
                @csrf
                <textarea name="content" placeholder="Paste the customer message here...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="error">{{ $message }}</p>
                @enderror
                <button type="submit">Analyze & Save</button>
                <a href="/messages">View all messages</a>
            </form>
        </div>
    </div>
</body>
</html>