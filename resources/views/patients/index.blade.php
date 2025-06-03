@extends('layouts.main')
@section('content')
    <h2>List of Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-success mb-2">Add New Patients</a>
    <table class="table-bordered table">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Date Of Birth</th>
            <th>Actions</th>
        </tr>
        @foreach ($patients as $patients)
            <tr>
                <td>{{$patients->id}}</td>
                <td>{{$patients->name}}</td>
                <td>{{$patients->mobile}}</td>
                <td>{{$patients->dob}}</td>
                <td>
                    <a href="{{ route('patients.show', $patients) }}" class="btn  btn-sm btn-primary">Show</a>
                    <a href="{{ route('patients.edit', $patients) }}" class="btn  btn-sm btn-warning">Edit</a>
                    <form style="display: inline" action="{{ route('patients.destroy', $patients) }}"
                        onclick="return(confirm('Delete this patients?'))" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection