@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="row">
            <div class="form-group col-md-12">
                <form method="POST" action="{{ route('division.update', $division->id) }}">
                    {{ csrf_field() }}
                    <div class="col-md-12 text-center">
                        <h1>Division: <strong>{{ $division->name }}</strong></h1>
                    </div>
                    <hr>

                    <div class="col-md-12 text-center">
                        <h2>Assigned subject:</h2>
                        @foreach ($subjects as $subject)
                        <label class="btn btn-outline-info btn-subject {{ in_array($subject->id, $divisionSubjects) ? 'active' : 'disabled' }}">

                            {{ $subject->name }}
                            {{ $subject->getTeacherByDivisionId($division->id)->first()['name'] }}
                        </label>
                        @endforeach
                    </div>

                    <!-- <div class="form-group">
                        <label for="division">Division name:</label>
                        <input type="text" class="form-control" id="division" name="division">
                    </div> -->
                    <hr>
                    @if ($flash = session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong>{{ $flash }}</strong> division has been updated.
                    </div>
                    @endif
                    <div class="col-md-12 text-center form-group">
                        <br>
                        <button type="submit" class="btn btn-warning">Update!</button>
                    </div>

                    <a class="btn btn-info" href="{{ route('division.create') }}">Cancel</a>
                    <button type="button" class="btn btn-danger btn-sm delete-division" data-token="{{ csrf_token() }}" data-address="{{ route('division.delete', $division->id) }}">Delete</button>

                    @include ('layouts.errors')
                </form>
            </div>
        </div>
    </div>

@endsection
