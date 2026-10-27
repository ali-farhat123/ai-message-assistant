<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
        .submit { width: 100%; background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; border: 0; padding: 12px; border-radius: 999px; font-size: 15px; font-weight: 700; cursor: pointer; margin-top: 4px; }
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
                <h1>Create your account</h1>
                <p>Start analyzing customer messages with AI.</p>
            </div>

            <div class="body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your name">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="pw">
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="At least 8 characters">
                            <button type="button" onclick="togglePw('password', this)">Show</button>
                        </div>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password_confirmation">Confirm password</label>
                        <div class="pw">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat the password">
                            <button type="button" onclick="togglePw('password_confirmation', this)">Show</button>
                        </div>
                        @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="submit" type="submit">Register</button>
                </form>

                <p class="foot">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
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