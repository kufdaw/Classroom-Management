@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('division.students.update', $division->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <div class="text-center">
                        <h2>Assign students to <strong>{{ $division->name }}</strong> division.</h2>
                    <hr>
                    @if ($flash = session('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong>{{ $flash }}</strong> students have been reassigned.
                    </div>
                    @endif
                </div>
                <select class="assign-students" name="user_id[]" multiple="multiple">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ ($division->students->contains('id', $student->id)) ? 'selected' : '' }}>
                            {{ $student->name . ' ' . $student->surname . ' | ' . $student->email }}
                            {{ ($student->division_id != NULL) ? ' || ' . $division->find($student->division_id)->name : '' }}
                         </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 text-center form-group">
                <br>
                <button type="submit" class="btn btn-warning">Update!</button>
            </div>
            @include ('layouts.errors')
        </form>
        </div>
        <div class="col-md-12">
            <hr>
            <a class="btn btn-info" href="{{ route('division.create') }}">Back</a>
            <hr>
        </div>
    </div>
</div>


@endsection
