<h1>All Messages</h1>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
@foreach ( $messages as $message )
    <p>{{ $message->content }}</p>
    <small>{{ $message->status }}</small>
@endforeach