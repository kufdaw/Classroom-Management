@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="col-md-12">

        <form method="POST" action="{{ route('profile.confirm', $user->registration_token) }}">
            {{ csrf_field() }}
            <div class="alert alert-success text-center" role="alert">
                Welcome <strong>{{ $user->name. ' ' . $user->surname }}</strong>! Now you just need to set your password and you can get all benefits from our Classroom Manager
            </div>

            <div class="form-group">
                <label for="password">Please, type your <strong>password </strong>here:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">And, just to be sure if you did it correctly, do it <strong>again</strong>: </label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Change it!</button>
            </div>
            @include ('layouts.errors')
        </form>

    </div>
</div>

<!-- <a href="">
    asdf
</a> -->

@endsection
