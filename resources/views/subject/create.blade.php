@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('subject.create') }}">
                {{ csrf_field() }}
                <h1>Current subject list:</h1>
                    @foreach($subjects as $subject)
                    <div class="row delete">
                        <div class="col-md-4">
                            {{ $subject->name }}
                        </div>
                        <div class="col-md-8">
                            <button type="button" class="btn btn-danger btn-sm delete-subject" data-subject="{{ $subject->name }}" data-token="{{ csrf_token() }}" data-address="{{ route('subject.delete', $subject->id) }}">Delete</button>
                        </div>
                    </div>
                    @endforeach
                @if ($flash = session('message'))
                <div class="alert alert-success text-center" role="alert">
                    <strong>{{ $flash }}</strong> has been successfully added to subject list.
                </div>
                @endif
                <hr>
                <h1>Add new subject</h1>
                <div class="form-group">
                    <label for="subject">Subject name:</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                @include ('layouts.errors')
            </form>

        </div>
    </div>


</div>



@endsection
