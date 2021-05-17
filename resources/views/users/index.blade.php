@extends('users.layout')

@section('content')

<div class="pull-left">
    <h3>User Informations</h3>
</div>
<div class="row">
    <div class="col lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('users.create')}}">Create new user</a>
        </div>
    </div>
</div>

@if($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email id</th>
        <th>Phone number</th>
        <th>Password</th>
        <th>Profile Image</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->profileimage}}</td>
            <td>
                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    <a class="btn btn-info" href="{{route('users.show', $user->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>