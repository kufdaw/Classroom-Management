@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $student->division->name }}</h1>
            <h4><strong>Your tutor is: </strong>{{ $student->division->tutor->name . ' ' . $student->division->tutor->surname }}</h4>
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
                        @foreach($student->division->subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->teachers->first()->name . ' ' . $subject->teachers->first()->surname }} </td>
                            <td>
                                {{ $subject->getGradesByStudentId($student->id)->pluck('value')->implode(', ') }}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                @if($student->mail_notification)
                    <div class="col-md-12 mail-notification bg-success" data-address="{{ route('grades.toggleNotification', 0) }}">
                        You are proud mail-grade subscriber. It means that you are up-dated to your grades by the email! But if you are tired of this, just double-click here to unsubscribe!
                    </div>
                @else
                    <div class="col-md-12 mail-notification bg-warning" data-address="{{ route('grades.toggleNotification', 1) }}">
                        You are not getting notification about your grades. Wanna stay up-dated with your notes on the email? Click here two times!
                    </div>
                @endif
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection
