@extends('layouts.admin')
@section('content')
<h1>Comments</h1>
@if(Session::has('delete_message'))
   <p class="alert alert-danger">{{session('delete_message')}}</p>
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Post Id</th>  
        <th>Author</th>
        <th>Is Active</th>
        <th>Email</th>
        <th>Body</th>
        <th>View replies</th>  
        <th>Approved</th>
        <th>Delete</th>   
      </tr>
    </thead>
    <tbody>
      @if($comments) 
        @foreach($comments as $comment)
          <tr>
          <td>{{$comment->id}}</td>
          <td>{{$comment->post_id}}</td>    
          <td>{{$comment->author}}</td>
          <td>{{$comment->is_active === 1 ? 'Approved': 'Unapproved'}}</td>      
          <td>{{$comment->email}}</td>
          <td>{{str_limit($comment->body, 20)}}</td>
          <td><a href="{{ route('replies.show', $comment->id) }}">View replies</a></td>      
          <td>
             @if($comment->is_active == 1)
                {!! Form::model($comment,['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]]) !!}
                  <input type="hidden" name="is_active" value="{{0}}">
                   {!! Form::submit('Unapprove', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}  
            @else
              {!! Form::model($comment,['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]]) !!}
                  <input type="hidden" name="is_active" value="{{1}}">
                   {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            @endif  
         </td>
          <td>
             {!! Form::model($comment,['method'=>'DELETE','action'=>['AdminCommentsController@destroy',$comment->id]]) !!}
                   {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}    
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
@stop