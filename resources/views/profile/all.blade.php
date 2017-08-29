@extends('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <hr>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
    $(function() {
        var action = 'chuj';
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/profile/all-data',
            aaSorting: [[2, 'asc']],
            columns: [
                {data: 'name'},
                {data: 'surname'},
                {data: 'role.name', name: 'role.id'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
