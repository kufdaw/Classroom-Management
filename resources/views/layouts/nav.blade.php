<nav class="navbar fixed-top navbar-light bg-faded">
    <div class="container">

            @if (Auth::check())
                <a class="navbar-brand item" href="#">
                    Welcome,
                    <strong>
                        {{ Auth::user()->name }}
                        &nbsp&nbsp|
                    </strong>
                </a>
                <a class="navbar-brand item" href="/logout">
                    Log out
                </a>
                <a class="navbar-brand item" href="/editprofile">
                    Edit Profile
                </a>
            @else
                <a class="navbar-brand item" href="/login">
                    Sign in
                </a>
            @endif
        <a class="navbar-brand item" href="../">Home</a>
    </div>
</nav>
