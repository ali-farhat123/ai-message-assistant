<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <style>
        :root { --main: #7c3aed; --main-dark: #5b21b6; --accent: #ec4899; --bg1: #eef2ff; --bg2: #fce7f3; }
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px 16px; background: linear-gradient(135deg, var(--bg1), var(--bg2)); color: #1f2937; }
        .box { width: 100%; max-width: 420px; background: #fff; border-radius: 16px; box-shadow: 0 10px 30px rgba(124,58,237,.2); overflow: hidden; }
        .head { background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; padding: 26px 28px; }
        .head h1 { margin: 0 0 4px; font-size: 24px; }
        .head p { margin: 0; font-size: 14px; opacity: .92; }
        .body { padding: 28px; }
        label { display: block; font-size: 13px; font-weight: 700; color: #374151; margin: 0 0 6px; }
        .field { margin-bottom: 18px; }
        input[type=email], input[type=password], input[type=text] { width: 100%; padding: 11px 14px; border: 2px solid #e5e7eb; border-radius: 10px; font: inherit; }
        input:focus { outline: none; border-color: var(--main); box-shadow: 0 0 0 3px rgba(124,58,237,.2); }
        .pw { position: relative; }
        .pw button { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: none; border: 0; color: var(--main); font-weight: 700; font-size: 12px; cursor: pointer; padding: 6px; }
        .error { color: #b91c1c; background: #fee2e2; padding: 7px 10px; border-radius: 6px; font-size: 13px; margin: 8px 0 0; }
        .status { background: #d1fae5; color: #065f46; padding: 10px 12px; border-radius: 8px; font-size: 14px; margin-bottom: 16px; }
        .remember { display: flex; align-items: center; gap: 8px; font-size: 14px; color: #4b5563; margin-bottom: 20px; }
        .submit { width: 100%; background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; border: 0; padding: 12px; border-radius: 999px; font-size: 15px; font-weight: 700; cursor: pointer; }
        .submit:hover { opacity: .92; }
        .foot { text-align: center; font-size: 14px; color: #6b7280; margin-top: 20px; }
        .foot a { color: var(--main); font-weight: 700; text-decoration: none; }
        .back { text-align: center; margin-top: 14px; }
        .back a { color: #6b7280; font-size: 13px; text-decoration: none; }
    </style>
</head>
<body>
    <div>
        <div class="box">
            <div class="head">
                <h1>Welcome back</h1>
                <p>Log in to manage your customer messages.</p>
            </div>

            <div class="body">
                @if (session('status'))
                    <div class="status">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="pw">
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Your password">
                            <button type="button" onclick="togglePw('password', this)">Show</button>
                        </div>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="remember">
                        <input type="checkbox" name="remember"> Remember me
                    </label>

                    <button class="submit" type="submit">Log in</button>
                </form>

                <p class="foot">No account yet? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
        <p class="back"><a href="/">← Back to home</a></p>
    </div>

    <script>
        function togglePw(id, btn) {
            var input = document.getElementById(id);
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.textContent = show ? 'Hide' : 'Show';
        }
    </script>
</body>
</html>