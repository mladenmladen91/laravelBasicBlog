@extends('layouts.admin')

@section('content')

  <h1>Create users</h1>
{!! Form::open(['method'=>'post', 'action'=>'AdminUsersController@store','files'=> true]) !!}
     <div class="form-group">
         {!! Form::label('name','Name') !!}
         {!! Form::text('name', null,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('password','Password') !!}
         {!! Form::password('password',['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('email','E-mail') !!}
         {!! Form::email('email', null,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('role_id','Role') !!}
         {!! Form::select('role_id', $roles, 1,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('is_active','Status') !!}
         {!! Form::select('is_active', array(1=>'Active', 0 => 'Unactive'),0,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('image','Image:') !!}
         {!! Form::file('image',['class'=> 'input-group']) !!}
     </div>
     {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@include('includes.error')
 
@stop
@section('footer')

@stop