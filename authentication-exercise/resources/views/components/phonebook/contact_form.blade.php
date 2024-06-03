<div>
    <form action="{{ $action }}" method="{{ $method }}" class="flex flex-col w-1/2">
        @csrf
        <input name="user_id" type="hidden" value="{{ Auth::id() }}">
        <label for="name">Name:</label>
        <input name="name" type="text">
        <label for="contact_number">Contact Number::</label>
        <input name="contact_number" type="text">
        <input type="submit">
    </form>
</div>
