@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="row">
            <div class="form-group col-md-12">
                <form method="POST" action="{{ route('division.update', $division->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-12 text-center">
                        <h1>Division: <strong>{{ $division->name }}</strong></h1>
                    </div>
                    <hr>

                    <div class="col-md-12 text-center">
                        <h2>Assigned subjects:</h2>
                        <hr>
                        @if ($flash = session('message'))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{ $flash }}</strong> subjects have been updated.
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-md-6">Subject</th>
                                        <th class="col-md-6">Teacher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr class="{{ $division->subjects->contains('id', $subject->id) ? 'subject-selected' : '' }}">
                                            <th class="col-md-6" >
                                                {{ $subject->name }}
                                            </th>
                                            <th class="col-md-6">
                                                <select class="custom-select" name="subjects[{{$subject->id}}]">
                                                    <option value="0" selected></option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id ? $teacher->id : 0 }}" {{ ($subject->getTeacherByDivisionId($division->id)->first()['id'] == $teacher->id) ? 'selected' : '' }}>
                                                            {{ $teacher->name . ' ' . $teacher->surname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- <div class="form-group">
                        <label for="division">Division name:</label>
                        <input type="text" class="form-control" id="division" name="division">
                    </div> -->

                    <div class="col-md-12 text-center form-group">
                        <br>
                        <button type="submit" class="btn btn-warning">Update!</button>
                    </div>

                    <a class="btn btn-info" href="{{ route('division.create') }}">Cancel</a>
                    <button type="button" class="btn btn-danger btn-sm delete-division" data-token="{{ csrf_token() }}" data-address="{{ route('division.delete', $division->id) }}">Delete</button>

                    @include ('layouts.errors')
                </form>
            </div>
        </div>
    </div>

@endsection
