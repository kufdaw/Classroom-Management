@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $division->name . ', ' . $subject->name}}</h1>
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
                                    @foreach($subject->grades->where('student_id', $student->id) as $grade)
                                        <a class="btn btn-secondary btn-sm edit-grade" data-address-update="{{ route('division.subject.grade-update', $grade->id) }}" data-address-delete="{{ route('division.subject.grade-delete', $grade->id) }}"> {{ $grade->value }} </a>
                                    @endforeach
                                </td>
                                <td>paragraph
                                    <input class="btn btn-secondary btn-sm form-control add-grade" name="grade" type="number" min="1" max="6" step="0.5">
                                    <a class="btn btn-sm btn-secondary add" data-address="{{ route('division.subject.grade-add', ['subjectId' => $subject->id, 'studentId' => $student->id]) }}"><strong>+</strong></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <hr>
            <div>
                <button class="btn btn-warning generate-csv" data-generate-csv="{{ route('division.subject.generate-csv', ['division' => $division->id, 'subject' => $subject->id]) }}">Generate CSV File</button>
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection
