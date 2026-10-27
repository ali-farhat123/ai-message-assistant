<h1>All Messages</h1>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
@foreach ( $messages as $message )
    <p>{{ $message->content }}</p>
    <small>{{ $message->status }}
          <p>Category: {{ $message->category }}</p>       
          <p>Priority: {{ $message->priority }}</p>
          <p>Summary: {{ $message->summary }}</p>
          <p>Suggested_reply: {{ $message->suggested_reply }}</p>
    </small>
@endforeach