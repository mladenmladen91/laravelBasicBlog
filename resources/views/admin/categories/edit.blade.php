@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Edit category</h1>
    <div class="col-sm-12">
{!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
     <div class="form-group">
         {!! Form::label('name','Name') !!}
         {!! Form::text('name', null, ['class'=> 'input-group']) !!}
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