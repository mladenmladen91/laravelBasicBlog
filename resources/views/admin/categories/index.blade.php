@extends('layouts.admin')

@section('content')
  <h1>Categories</h1>
    @if(Session::has('delete_message'))
<p>{{ session('delete_message') }}</p>
@endif

@if(Session::has('update_message'))
<p>{{ session('update_message') }}</p>
@endif

@if(Session::has('create_message'))
<p>{{ session('create_message') }}</p>
@endif
<div class="row">
   <div class="col-xs-6">
    {!! Form::open(['method'=>'post', 'action'=>'AdminCategoriesController@store']) !!}
         <div class="fomr-group">
           {!! Form::label('name', 'Name',['class'=>'input-group']) !!}  
           {!! Form::text('name', null,['class'=>'input-group']) !!}
        </div>
          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

</div>
<div class="col-xs-6">    
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
           
      </tr>
    </thead>
    <tbody>
      @if($categories) 
        @foreach($categories as $category)
          <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
          <td><a href="{{ route('categories.edit', $category->id) }}">EDIT</a></td>
          <td>
             {!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                   {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}    
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
 </div>   
</div>    
@stop
@section('footer')

@stop