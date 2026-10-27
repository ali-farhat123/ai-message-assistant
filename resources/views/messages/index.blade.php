<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Messages</title>
    <style>
        :root {
            --main: #7c3aed;
            --main-dark: #5b21b6;
            --accent: #ec4899;
            --bg1: #eef2ff;
            --bg2: #fce7f3;
        }
        body { font-family: system-ui, sans-serif; background: linear-gradient(135deg, var(--bg1), var(--bg2)); min-height: 100vh; margin: 0; padding: 0 0 40px; color: #1f2937; }
        .header { background: linear-gradient(90deg, var(--main), var(--accent)); color: #fff; padding: 28px 16px; margin-bottom: 28px; box-shadow: 0 4px 14px rgba(124,58,237,.35); }
        .header-in { max-width: 760px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        h1 { margin: 0; font-size: 26px; }
        .btn { background: #fff; color: var(--main-dark); padding: 9px 18px; border-radius: 999px; text-decoration: none; font-size: 14px; font-weight: 600; }
        .btn:hover { background: #f5f3ff; }
        .wrap { max-width: 760px; margin: 0 auto; padding: 0 16px; }
        .success { background: #d1fae5; color: #065f46; border-left: 4px solid #10b981; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
        .empty { text-align: center; color: #6b7280; padding: 40px; background: #fff; border-radius: 12px; }
        .card { background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 14px rgba(0,0,0,.08); margin-bottom: 16px; border-left: 6px solid #d1d5db; }
        .p-urgent { border-left-color: #ef4444; }
        .p-normal { border-left-color: #3b82f6; }
        .content { margin: 0 0 14px; font-size: 16px; line-height: 1.5; font-weight: 500; }
        .badges { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 12px; }
        .badge { font-size: 12px; padding: 4px 12px; border-radius: 999px; background: #e5e7eb; color: #374151; font-weight: 600; }
        .urgent { background: #ef4444; color: #fff; }
        .normal { background: #3b82f6; color: #fff; }
        .complaint { background: #f97316; color: #fff; }
        .inquiry { background: #8b5cf6; color: #fff; }
        .purchase { background: #10b981; color: #fff; }
        .label { font-size: 12px; text-transform: uppercase; letter-spacing: .05em; color: var(--main); font-weight: 700; margin: 12px 0 4px; }
        .text { margin: 0; font-size: 14px; line-height: 1.6; }
        .reply { background: #f5f3ff; border-left: 3px solid var(--main); padding: 10px 12px; border-radius: 6px; }
        .pending { color: #9ca3af; font-size: 13px; font-style: italic; }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-in">
            <h1>All Messages</h1>
            <a class="btn" href="/messages/create">+ New Message</a>
        </div>
    </div>

    <div class="wrap">
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @forelse ($messages as $message)
            <div class="card p-{{ $message->priority }}">
                <p class="content">{{ $message->content }}</p>

                <div class="badges">
                    <span class="badge">{{ $message->status }}</span>
                    @if ($message->category)
                        <span class="badge {{ $message->category }}">{{ $message->category }}</span>
                    @endif
                    @if ($message->priority)
                        <span class="badge {{ $message->priority }}">{{ $message->priority }}</span>
                    @endif
                </div>

                @if ($message->summary)
                    <p class="label">Summary</p>
                    <p class="text">{{ $message->summary }}</p>
                @endif

                @if ($message->suggested_reply)
                    <p class="label">Suggested reply</p>
                    <p class="text reply">{{ $message->suggested_reply }}</p>
                @endif

                @if (! $message->summary)
                    <p class="pending">No AI analysis for this message.</p>
                @endif
            </div>
        @empty
            <div class="empty">No messages yet. Click "New Message" to add one.</div>
        @endforelse
    </div>
</body>
</html>