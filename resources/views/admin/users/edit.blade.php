@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Create users</h1>
    <div class="col-sm-3"><img class="img-responsive" src="../../../../public/images/{{$user->image}}"></div>
    <div class="col-sm-9">
{!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=> true]) !!}
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
         {!! Form::select('role_id',[1 => 'Subscriber', 2 => 'Administartor'], $user->role_id,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('is_active','Status') !!}
         {!! Form::select('is_active', array(1=>'Active', 0 => 'Unactive'), $user->is_active,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
        {!! Form::file('image',['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">    
        {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
     </div>      
{!! Form::close() !!}
    </div>
</div>    
 <div class="row">
  <div class="col-xs-12">     
   @include('includes.error')
  </div>      
</div>
@stop

@section('footer')
   
@stop