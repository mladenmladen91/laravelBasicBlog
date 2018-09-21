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
        <th>Comment Id</th>  
        <th>Author</th>
        <th>Is Active</th>
        <th>Email</th>
        <th>Body</th>
        <th>Approved</th>
        <th>Delete</th>   
      </tr>
    </thead>
    <tbody>
      @if($replies) 
        @foreach($replies as $reply)
          <tr>
          <td>{{$reply->id}}</td>
          <td>{{$reply->comment_id}}</td>    
          <td>{{$reply->author}}</td>
          <td>{{$reply->is_active === 1 ? 'Approved': 'Unapproved'}}</td>      
          <td>{{$reply->email}}</td>
          <td>{{str_limit($reply->body, 20)}}</td>      
          <td>
             @if($reply->is_active == 1)
                {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                  <input type="hidden" name="is_active" value="{{0}}">
                   {!! Form::submit('Unapprove', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}  
            @else
              {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                  <input type="hidden" name="is_active" value="{{1}}">
                   {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            @endif  
         </td>
          <td>
             {!! Form::model($reply,['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                   {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}    
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
@stop