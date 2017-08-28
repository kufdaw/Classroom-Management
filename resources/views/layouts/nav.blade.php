
<nav class="navbar fixed-top">
    <div class="container">
            @if (Auth::check())
                <a class="navbar-brand item" href="#">
                    Welcome,
                    <strong>
                        {{ Auth::user()->name }}
                        &nbsp&nbsp|
                    </strong>
                </a>
                <a class="navbar-brand item" href="{{ route('logout') }}">
                    Log out
                </a>
                <a class="navbar-brand item toggle-dropdown" href="{{ route('profile') }}">
                    Edit Profile
                    <div class="drop-down">
                        <a href="#"> dupa </a>
                        <a href="#"> dupa </a>
                        <a href="#"> dupa </a>
                    </div>
                </a>
                @if (Auth::user()->hasRole('student'))
                <a class="navbar-brand item" href="{{ route('grades.index') }}">
                    Grades
                </a>
                @elseif (Auth::user()->hasRole('teacher'))
                <a class="navbar-brand item" href="{{ route('division.index') }}">
                    Divisions
                </a>
                <a class="navbar-brand item" href="{{ route('history.index') }}">
                    History
                </a>
                @elseif (Auth::user()->hasRole('admin'))
                    <a class="navbar-brand item" href="{{ route('profile.create') }}">
                        Add User
                    </a>
                    <a class="navbar-brand item" href="{{ route('subject.create') }}">
                        Add subject
                    </a>
                    <a class="navbar-brand item" href="{{ route('division.index') }}">
                        Divisions
                    </a>
                    <a class="navbar-brand item" href="{{ route('division.index') }}">
                        Statistics
                    </a>
                @endif
            @else
                <a class="navbar-brand item" href="{{ route('login') }}">
                    Sign in
                </a>
            @endif
        <a class="navbar-brand item" href="{{ route('home') }}">Home</a>
    </div>
</nav> -->
