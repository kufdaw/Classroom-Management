<nav class="fixed-top navbar navbar-inverse bg-inverse navbar-toggleable-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleCenteredNav" aria-controls="navbarsExampleCenteredNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleCenteredNav">
        @if(Auth::check())
        <span class="nav-link nav-welcome">
            Welcome, <strong> {{ Auth::user()->name }} </strong>
        </span>
        @endif
        <div class="container">
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Edit Profile</a>
                    </li>
                    @if( Auth::user()->hasRole('student'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('grades.index') }}">Grades</a>
                        </li>
                    @elseif (Auth::user()->hasRole('teacher'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('division.index') }}">Divisions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history.index') }}">History</a>
                    </li>
                    @elseif (Auth::user()->hasRole('admin'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="{{ route('profile.all') }}">View</a>
                            <a class="dropdown-item" href="{{ route('profile.create') }}">Add new</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subject.create') }}">Add Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('division.index') }}">Divisions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('division.index') }}">Statistics</a>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
        @if(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item logout">
                    <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
