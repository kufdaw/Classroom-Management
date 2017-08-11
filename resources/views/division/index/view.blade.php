@php
    if (Auth::user()->role->name == 'admin')
        return view('division.index.admin');
    elseif (Auth::user()->role->name == 'teacher')
        return view('division.index.admin');
@endphp
