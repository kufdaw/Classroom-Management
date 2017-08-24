@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $student->division->name }}</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col-md-2"><strong>Subject<strong></td>
                            <td class="col-md-2"><strong>Teacher<strong></td>
                            <td class="col-md-8"><strong>Grades<strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection
