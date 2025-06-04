@extends('layouts.main')
@section('content')
    <h2>Lists of Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-2">Create Appointments</a>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Appointment Date</th>
            <th>Chief Complaint</th>
            <th>Actions</th>
        </tr>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{$appointment->id}}</td>
                <td>{{$appointment->patient_id}}</td>
                <td>{{$appointment->doctor_id}}</td>
                <td>{{$appointment->appointment_at}}</td>
                <td>{{$appointment->cc}}</td>
                <td class=" gap-2 d-flex align-items-center">
                    <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return(confirm('Delete this appointment?'))">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>
@endsection