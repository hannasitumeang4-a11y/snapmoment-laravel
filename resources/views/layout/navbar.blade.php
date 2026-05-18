<nav style="background:black;color:white;padding:15px;display:flex;justify-content:space-between">

<div>
<b>Fotobooth Booking</b>
</div>

<div>

<a href="/" style="color:white;margin-right:15px">Home</a>
<a href="/booking" style="color:white;margin-right:15px">Booking</a>

@if(session('user_id'))

<span>Hi {{session('nama')}}</span>
<a href="/logout" style="color:white;margin-left:10px">Logout</a>

@else

<a href="/login" style="color:white;margin-right:10px">Login</a>
<a href="/register" style="color:white">Register</a>

@endif

</div>

</nav>