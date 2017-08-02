@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="col-md-12">
        <h1>Sometimes it's good to keep account safe. Remember to change password regurarly!</h1>
        <form method="POST" action="/editprofile">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="password_current">We can't let you just change password because of safety cases.<br> We need to be sure this is your account, so write your current password:  </label>
                <input type="password" class="form-control" id="password_current" name="password_current">
            </div>
            <hr>
            <div class="form-group">
                <label for="password">Then you have to pass your new:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">And just to be sure, do it again:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Change password!</button>
            </div>
            @include ('layouts.errors')
        </form>

    </div>
</div>
@endsection
