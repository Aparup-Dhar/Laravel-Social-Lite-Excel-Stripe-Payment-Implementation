@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card offset-2" style="width:900px">
            <div class="card-header">
                Import Excel File data in Laravel
            </div>
            <div class="card-body">
                @if (session('message'))
                    <h6 class="alert alert-warning">{{ session('message') }}</h6>
                @endif

                <form action="{{ url('import-student') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <input type="file" name="student_import_file" required class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-success">Import Data</button>
                </form>
                <br>
                    <br>
                    <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($students as $s)
                            <td>{{$s->name}}</td>
                            <td>{{$s->email}}</td>
                            <td>{{$s->phone}}</td>
                            <td>{{$s->course}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
