@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td><strong>Date<strong></td>
                            <td><strong>User</strong></td>
                            <td><strong>Grade</strong></td>
                            <td><strong>Operation</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gradesHistory as $grade)
                        <tr class="history">
                            <td>{{ $grade->created_at }}</td>
                            <td>{{ $grade->user->name . ' ' . $grade->user->surname }}</td>
                            <td>{{ $grade->value }}</td>
                            <td>{{ $grade->operation }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $gradesHistory->links() }}
            <hr>
        </div>
    </div>
</div>

@endsection
