<h1>Hello I am Service Provider</h1>
<form id="logout-form" action="{{ route('provider.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
