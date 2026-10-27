<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <style>
        .dash-wrap { max-width: 900px; margin: 0 auto; padding: 32px 16px; }
        .dash-hero { background: linear-gradient(90deg, #7c3aed, #ec4899); color: #fff; border-radius: 16px; padding: 32px; box-shadow: 0 10px 30px rgba(124,58,237,.3); }
        .dash-hero h3 { margin: 0 0 8px; font-size: 26px; }
        .dash-hero p { margin: 0; opacity: .92; font-size: 15px; line-height: 1.5; }
        .dash-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-top: 24px; }
        .dash-card { background: #fff; border-radius: 14px; padding: 28px; box-shadow: 0 6px 20px rgba(0,0,0,.08); border-top: 5px solid #7c3aed; text-decoration: none; color: inherit; display: block; transition: transform .15s, box-shadow .15s; }
        .dash-card:hover { transform: translateY(-4px); box-shadow: 0 12px 28px rgba(124,58,237,.2); }
        .dash-card.pink { border-top-color: #ec4899; }
        .dash-icon { font-size: 34px; }
        .dash-card h4 { margin: 12px 0 6px; font-size: 20px; color: #1f2937; }
        .dash-card p { margin: 0 0 16px; color: #6b7280; font-size: 14px; line-height: 1.6; }
        .dash-link { color: #7c3aed; font-weight: 700; font-size: 14px; }
        .dash-card.pink .dash-link { color: #db2777; }
    </style>

    <div class="dash-wrap">
        <div class="dash-hero">
            <h3>Welcome back, {{ Auth::user()->name }} 👋</h3>
            <p>Paste a customer message to get an AI summary and a suggested reply, or review your previous messages.</p>
        </div>

        <div class="dash-grid">
            <a class="dash-card" href="/messages/create">
                <div class="dash-icon">✍️</div>
                <h4>Write a message</h4>
                <p>Paste a customer message and let the AI classify it, set its priority, and suggest a reply.</p>
                <span class="dash-link">New message →</span>
            </a>

            <a class="dash-card pink" href="/messages">
                <div class="dash-icon">📬</div>
                <h4>View messages</h4>
                <p>See all your saved messages with their category, priority, summary, and suggested reply.</p>
                <span class="dash-link">Open messages →</span>
            </a>
        </div>
    </div>
</x-app-layout>