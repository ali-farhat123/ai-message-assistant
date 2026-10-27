<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Message Assistant</title>
    <style>
        :root {
            --main: #7c3aed;
            --main-dark: #5b21b6;
            --accent: #ec4899;
            --bg1: #eef2ff;
            --bg2: #fce7f3;
        }
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; margin: 0; color: #1f2937; background: linear-gradient(135deg, var(--bg1), var(--bg2)); min-height: 100vh; }
        .nav { max-width: 1000px; margin: 0 auto; padding: 20px 16px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-weight: 800; font-size: 18px; color: var(--main-dark); }
        .nav a { color: var(--main-dark); text-decoration: none; font-weight: 600; font-size: 14px; margin-left: 16px; }
        .hero { max-width: 760px; margin: 40px auto 0; padding: 0 16px; text-align: center; }
        .tag { display: inline-block; background: #fff; color: var(--main); padding: 6px 14px; border-radius: 999px; font-size: 13px; font-weight: 700; box-shadow: 0 2px 8px rgba(124,58,237,.15); }
        h1 { font-size: 44px; line-height: 1.15; margin: 20px 0 16px; background: linear-gradient(90deg, var(--main), var(--accent)); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .lead { font-size: 18px; line-height: 1.6; color: #4b5563; margin: 0 0 28px; }
        .btn { display: inline-block; padding: 12px 28px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: 15px; margin: 4px; }
        .btn-primary { background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; box-shadow: 0 6px 18px rgba(124,58,237,.35); }
        .btn-primary:hover { opacity: .92; }
        .btn-outline { background: #fff; color: var(--main-dark); border: 2px solid var(--main); }
        .features { max-width: 1000px; margin: 60px auto 0; padding: 0 16px 50px; display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 18px; }
        .feature { background: #fff; border-radius: 14px; padding: 24px; box-shadow: 0 6px 20px rgba(0,0,0,.07); border-top: 4px solid var(--main); }
        .feature:nth-child(2) { border-top-color: var(--accent); }
        .feature:nth-child(3) { border-top-color: #10b981; }
        .icon { font-size: 28px; }
        .feature h3 { margin: 10px 0 6px; font-size: 18px; }
        .feature p { margin: 0; color: #6b7280; font-size: 14px; line-height: 1.6; }
        .footer { text-align: center; color: #6b7280; font-size: 13px; padding-bottom: 30px; }
    </style>
</head>
<body>
    <div class="nav">
        <span class="logo">AI Message Assistant</span>
        <div>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>

    <div class="hero">
        <span class="tag">Powered by Gemini AI</span>
        <h1>Handle customer messages in seconds</h1>
        <p class="lead">Paste a customer message and get an instant category, priority, short summary, and a suggested reply.</p>

        @auth
            <a class="btn btn-primary" href="{{ route('dashboard') }}">Go to Dashboard</a>
        @else
            <a class="btn btn-primary" href="{{ route('register') }}">Get started</a>
            <a class="btn btn-outline" href="{{ route('login') }}">Log in</a>
        @endauth
    </div>

    <div class="features">
        <div class="feature">
            <div class="icon">🏷️</div>
            <h3>Smart classification</h3>
            <p>Every message is labeled as a complaint, inquiry, or purchase request.</p>
        </div>
        <div class="feature">
            <div class="icon">⚡</div>
            <h3>Priority detection</h3>
            <p>Urgent messages are flagged in red so your team knows what to answer first.</p>
        </div>
        <div class="feature">
            <div class="icon">💬</div>
            <h3>Suggested replies</h3>
            <p>Get a polite draft reply and a one-line summary for each message.</p>
        </div>
    </div>

    <div class="footer">Built with Laravel</div>
</body>
</html>