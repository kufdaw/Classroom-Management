<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-3">Subject</th>
                            <th class="col-md-3">Tutor</th>
                            <th class="col-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->divisions as $teacherDivision)
                            <tr>
                                <td class="col-md-2">{{ $teacherDivision->name }}</td>
                                <td class="col-md-3">{{ $teacherDivision->subjects()->find($teacherDivision->pivot->subject_id)['name'] }}</td>
                                <td class="col-md-3">{{ $teacherDivision->tutor->name . ' ' . $teacherDivision->tutor->surname }}</td>
                                <td class="col-md-4"><a class="btn btn-primary edit-division" href="{{ route('division.subject.grades-edit', ['division' => $teacherDivision->id, 'subject' => $teacherDivision->pivot->subject_id]) }}">Supervision</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>
</div>
