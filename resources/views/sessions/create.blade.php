@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="col-md-12">
        <h1>Do you want to meet us closer? Sign in!</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            @include ('layouts.errors')
        </form>

    </div>


</div>


@endsection
