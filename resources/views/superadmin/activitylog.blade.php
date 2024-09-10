@extends('superadmin.admin')

@section('main-content')
<h1>Activity Log</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->user->name }}</td>
            <td>{{ $log->description }}</td>
            <td>{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection