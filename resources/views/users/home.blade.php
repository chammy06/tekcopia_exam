@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-primary" href="{{ route('users.create') }}"> Create New User</a>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @if ($user['is_deleted'] == 0)
                            <tr class="default">
                        @else
                            <tr class="active">
                        @endif
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['fname'] }}</td>
                            <td>{{ $user['lname'] }}</td>
                            <td>{{ $user['address'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                        @if ($user['is_deleted'] == 0)
                            <td><a href="{{action('UsersController@show', $user['id'])}}" class="btn btn-info">View</a>
                                <a href="{{action('UsersController@edit', $user['id'])}}" class="btn btn-success">Update</a>
                                <a href="{{action('UsersController@destroy', $user['id'])}}" class="btn btn-danger">Delete</a>
                            </td>
                        @else
                            <td>Deleted</td>
                        @endif
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
