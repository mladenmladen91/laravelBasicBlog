@extends('layouts.admin')

@section('content')
@if(Session::has('delete_message'))
<p>{{ session('delete_message') }}</p>
@endif
<form action="{{route('posts.delete')}}" method="post">
<table class="table table-striped">
    <div class="col-xs-4"><input class="btn btn-danger" type="submit" value="Delete" name="delete"></div>
    <thead>
      <tr>
        <th><input type="checkbox" id="checkBoxMain" name="checkBoxMain"></th>  
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Author</th>
        <th>Category</th>  
        <th>Edit</th>
        <th>Delete</th>   
      </tr>
    </thead>
    <tbody>
      @if($posts) 
        @foreach($posts as $post)
          <tr>
          <td><input type="checkbox" class="checkBox" name="checkBoxes[]" value="{{$post->id}}"></td>      
          <td>{{$post->title}}</td>
          <td>{{str_limit($post->body, 7)}}</td>
          <td><img src="../images/{{$post->image}}" height="50" width="50"></td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category->name}}</td>      
          <td><a href="{{ route('posts.edit', $post->id) }}">EDIT</a></td>
          <td>
             {!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
                   {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}    
          </td>      
          </tr>      
        @endforeach
      @endif    
      
     
    </tbody>
  </table>
</form>    
  
@stop
@section('footer')
  <script>
        $(document).ready(function(){
            $("#checkBoxMain").click(function(){
                if(this.checked === true){
                     $(".checkBox").each(function(){
                      this.checked = true; 
                    }); 
                }else{
                    $(".checkBox").each(function(){
                        this.checked = false;
                    }); 
                }
            });
            
        });

  </script>
@stop