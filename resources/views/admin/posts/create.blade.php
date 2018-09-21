@extends('layouts.admin')
@section('content')
      <h1>Create posts</h1>
@include('includes.tiny')
{!! Form::open(['method'=>'post', 'action'=>'AdminPostsController@store','files'=> true]) !!}
     <div class="form-group">
         {!! Form::label('title','Title') !!}
         {!! Form::text('title', null,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('body','Content') !!}
         {!! Form::textarea('body', null,['class'=> 'input-group', 'rows'=>3]) !!}
     </div>
     
     <div class="form-group">
         {!! Form::label('category_id','Category') !!}
         {!! Form::select('category_id',$categories,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('image','Image:') !!}
         {!! Form::file('image',['class'=> 'input-group']) !!}
     </div>
     {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@include('includes.error')
@stop