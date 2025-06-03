@extends('layouts.main')
@section('content')
    <h2>List of Doctors</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-success mb-2">Add New Doctors</a>
    <table class="table-bordered table">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Designation</th>
            <th>Departments</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @foreach ($doctors as $doctor)
            <tr>
                <td>{{$doctor->id}}</td>
                <td>{{$doctor->name}}</td>
                <td></td>
                <td>{{$doctor->designation_id}}</td>
                <td>{{$doctor->department_id}}</td>
                <td>{{$doctor->created_at}}</td>
                <td>
                    <a href="{{ route('doctors.show', $doctor) }}" class="btn  btn-sm btn-primary">Show</a>
                    <a href="{{ route('doctors.edit', $doctor) }}" class="btn  btn-sm btn-warning">Edit</a>
                    <form style="display: inline" action="{{ route('doctors.destroy', $doctor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection