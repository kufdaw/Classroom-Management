@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="col-md-12">
        <h1>Add new user to the system.</h1>
        <form method="POST" action="/profile/create">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
              <label for="date">Birth Date:</label>
              <input type="text" class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" />
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select class="custom-select" name="role">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="alert alert-info" role="alert">
                <strong>Can't see set password option?</strong> Just chill, let newcomers set it by themselves!
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create new user!</button>
            </div>

            @if ($flash = session('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Congratulations</strong>! We sent email to <strong>{{ $flash->name . ' ' . $flash->surname }}</strong>. He/she need to check it to finish registration proccess.
            </div>
            @endif

            @include ('layouts.errors')
        </form>

    </div>
</div>

@endsection
