@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Users List</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            @if($users->count())
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <div class="alert alert-warning text-center">
                    No users found
                </div>
            @endif

        </div>
    </div>
@endsection