<h1>Hello I am User</h1>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
