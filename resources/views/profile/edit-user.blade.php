@extends ('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('profile.update-user', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
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
                    <label for="role">Role: </label>
                    <select class="form-control" disabled name="role">
                        @foreach($roles as $role)
                        {{dump($role->id)}}
                        <option {{ ($user->role->id == $role->id) ? 'selected' : '' }} value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                        @endforeach
                    </select>
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
                    <strong>{{ $flash }}</strong> has been correctly updated.
                </div>
                @endif
                @include ('layouts.errors')
            </form>
        </div>
            @if($user->hasRole('teacher'))
                <div class="col-md-12">
                    <hr>
                    <button class="btn btn-warning" id="teacher-stats" data-grades="{{ route('get-teacher-grades', $user->id) }}" type="submit" >Show grades stats!</button>
                    <div id="chart_div"></div>
                    <hr>
                </div>
            @endif
    </div>
</div>

@endsection
