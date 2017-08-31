@extends ('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2> Select division and subject to see grades </h2>
            <hr>
        </div>
        <div class="form-group col-md-4">
            <select class="form-control" size="{{ $divisions->count() }}">
                @foreach($divisions as $division)
                    <option class="select-division" data-address={{ route('get-subjects', $division->id) }}> {{ $division->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <select class="form-control select-subject" size="{{ $divisions->count() }}">
            </select>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-2">Name</th>
                        <th class="col-md-10">Grades</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($division->students as $student)
                        <tr>
                                <td> {{ $student->name }}</td>
                                <td>
                                    @foreach($subject->grades->where('student_id', $student->id) as $grade) // tego subjecta tutaj trzeba wyciagnac jquerem cos takiego tam elo bo go nie ma
                                        {{ $grade->value }}
                                    @endforeach
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
