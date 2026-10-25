<form method="POST" action="/messages">
    @csrf
    <textarea name="content"></textarea>
    @error('content')
        <p>{{ $message }}</p>
    @enderror
    <button type="submit">Save</button>
</form>