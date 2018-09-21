@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Edit posts</h1>
    <div class="col-sm-3"><img class="img-responsive" src="../../../../public/images/{{$post->image}}"></div>
    <div class="col-sm-9">
{!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=> true]) !!}
     <div class="form-group">
         {!! Form::label('title','Title') !!}
         {!! Form::text('title',null,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('body','Content') !!}
         {!! Form::textarea('body', null,['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('category_id','Category') !!}
         {!! Form::select('category_id', $categories, $post->category_id, ['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">
        {!! Form::file('image',['class'=> 'input-group']) !!}
     </div>
     <div class="form-group">    
        {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}
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