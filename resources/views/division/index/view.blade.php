@extends ('layouts.master')

@section ('content')
    @if (Auth::user()->role->name == 'admin')
        @include('division.index.admin', ['divisions' => $divisions, 'tutors' => $tutors])
    @endif
    @if (Auth::user()->role->name == 'teacher')
        @include('division.index.teacher', ['divisions' => $divisions, 'tutors' => $tutors])
    @endif
@endsection
