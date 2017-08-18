@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$division->name . ', ' . App\Subject::find($subjectId)->name}}</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-sm-2">Name</th>
                            <th class="col-sm-8">Grades</th>
                            <th class="col-sm-2">Add grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($division->students as $student)
                            <tr>
                                <td >{{ $student->name . ' ' . $student->surname }}</td>
                                <td class="grade-list">
                                    @foreach(App\Subject::find($subjectId)->grades->where('student_id', $student->id) as $grade)
                                        <a class="btn btn-secondary btn-sm edit-grade" data-address-update="{{ route('division.subject.grade-update', $grade->id) }}" data-address-delete="{{ route('division.subject.grade-delete', $grade->id) }}"> {{ $grade->value }} </a>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm add" data-address="{{ route('division.subject.grade-add', ['subjectId' => $subjectId, 'studentId' => $student->id]) }}"><strong>+</strong></a>
                                    <input class="btn btn-secondary btn-sm form-control add-grade" name="grade" type="number" min="1" max="6" step="0.5">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
