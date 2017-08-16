@extends ('layouts.master')

@section ('content')

    @if (Auth::user()->hasRole('admin'))
        @include('division.index.admin', ['divisions' => $divisions, 'tutors' => $tutors])

    @elseif (Auth::user()->hasRole('teacher'))
        @include('division.index.teacher', ['divisions' => $divisions, 'tutors' => $tutors, 'teacherDivisions' => $teacherDivisions])
    @endif

@endsection
