<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form method="POST" action="{{ route('division.store') }}">

                {{ csrf_field() }}

                <h1>Current division list:</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-4">Division</th>
                                <th class="col-md-6">Tutor</th>
                                <th class="col-md-2">Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                            <tr class="accordion-toggle">
                                <th>
                                    {{ $division->name }}
                                    <button type="button" class="btn btn-danger btn-sm delete-division" data-division="{{ $division->name }}" data-token="{{ csrf_token() }}" data-address="{{ route('division.delete', $division->id) }}">Delete</button>
                                </th>

                                <th class="table-tutor">{{ $division->tutor->name . ' ' . $division->tutor->surname }}</th>

                                <th>
                                  <a class="btn btn-info btn-sm edit-division" href="{{ route('division.subjects.edit', $division->id) }}">Subjects</a>
                                  <a class="btn btn-primary btn-sm edit-division" href="{{ route('division.students.edit', $division->id) }}">Students</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($flash = session('message'))
                <div class="alert alert-success text-center" role="alert">
                    <strong>{{ $flash }}</strong> has been successfully added to division list.
                </div>
                @endif

                <hr>

                <h1>Add new division</h1>
                <div class="form-group">
                    <label for="division">Division name:</label>
                    <input type="text" class="form-control" id="division" name="name">
                </div>

                <div class="form-group">
                    <label for="tutor">Tutor:</label>
                    <select class="custom-select" name="tutor_id">
                        @foreach($tutors as $tutor)
                        <option value="{{ $tutor->id }}">
                            {{ $tutor->name . ' ' . $tutor->surname }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

                @include ('layouts.errors')
            </form>

        </div>
    </div>


</div>
