@extends('layouts.admin')

@section('content')
@if(Session::has('message'))
<p>{{ session('message') }}</p>
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Is Active</th>
        <th>Email</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>   
      </tr>
    </thead>
    <tbody>
      @if($users) 
        @foreach($users as $user)
          <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->role->name}}</td>
          <td>{{$user->is_active === 1 ? 'Active': 'Unactive'}}</td>      
          <td>{{$user->email}}</td>
          <td><img src="../images/{{$user->image}}" height="50" width="50"></td> 
          <td><a href="{{ route('users.edit', $user->id) }}">EDIT</a></td>
          <td>
             {!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
                   {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}    
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
@stop
@section('footer')

@stop
