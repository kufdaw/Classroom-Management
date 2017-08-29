@extends('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Role</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name . ' ' . $user->surname }}</td>
                            <td>{{ $user->role->name }} </td>
                            <td>
                                 <a class="btn btn-info btn-md edit-division" href="#">Edit</a>
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
