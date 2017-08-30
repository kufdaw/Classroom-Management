@extends ('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('profile.update-user') }}">
                <div class="form-group">
                    <label for="name">Name:  </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="surname">Surname: </label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname}}">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password confirmation:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update!</button>
                </div>
                @if ($flash = session('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ $flash }}
                </div>
                @endif
                @include ('layouts.errors')
            </form>

        </div>
    </div>
</div>

@endsection
