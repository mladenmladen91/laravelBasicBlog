@extends('layouts.blog-post')

@section('content')
<div class="row">
  <div class="col-xs-12 text-center">   
    <!-- First Blog Post -->
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>{{$post->updated_at}}</p>
            <hr>
            <img class="img-responsive mx-auto d-block" src="{{ URL::to('/images/' . $post->image) }}" height="300" width="300" alt="no_image">
            <hr>
            <p>{!! $post->body !!}</p>
            
    </div>
  
    

    
    <div id="comment_area" class="col-xs-8">
          @if(Session::has('comment_message'))
             <p>{{session('comment_message')}}</p> 
         @endif
                   @if(Auth::check())
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['method'=>'post', 'action'=>'AdminCommentsController@store']) !!}
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                     <div class="form-group">
                         {!! Form::textarea('body', null, ['class'=>'input-group', 'rows'=>3,'placeholder'=>' add a comment...']) !!}
                     </div>
                     <div class="form-group">
                         {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
                     </div>
                    {!! Form::close() !!}
                @endif        
              </div>
       <div class="col-xs-6 all_comments">
           <h1>All comments:</h1>
      @foreach($post->comments->all() as $comment)
            @if($comment->is_active == 1)
               <div class="media">
                   <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->updated_at}}</small>
                        </h4>
                        {{$comment->body}}
                     @foreach($comment->replies->all() as $reply)
                       @if($reply->is_active == 1)
                     <div id="nested-comment" class="media nester">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->updated_at}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>
                         </div>
                       @endif
                    @endforeach 
                       
                       
                   


                        
           
                           

                    
                       @if(Auth::check())
                           <div class="comment-reply-container">
                               @if(Session::has('create_message'))
                               <p><span class="alert alert-danger">{{session('create_message')}}</span></p>
                               @endif
                               <div class="comment-reply col-sm-8 pull-left">
                                   {!! Form::open(['method'=>'post', 'action'=>'CommentRepliesController@store']) !!}
                                    <input type="hidden" value="{{$comment->id}}" name="comment_id">
                                     <div class="form-group">
                                       {!! Form::textarea('body', null, ['class'=>'input-group', 'rows'=>3]) !!}
                                     </div>
                                     <div class="form-group">
                                       {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                                     </div>
                                        {!! Form::close() !!}
                                 </div>

                          </div>
                       @endif
                       
                    </div>
                    
                </div>
           <hr> 
             @endif
      @endforeach
     </div>  
     
</div>

  

@stop