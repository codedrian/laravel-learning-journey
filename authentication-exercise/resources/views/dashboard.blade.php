<div>
    Welcome {{ Auth::user()->name }}This is the dashboard
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="logout">
    </form>
</div>
