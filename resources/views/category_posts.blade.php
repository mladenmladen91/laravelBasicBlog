@extends('layouts.blog-post')
@section('content')
  
       <!-- Blog Entries Column -->
        <div class="col-md-12">
         @if($posts)    
          @foreach($posts as $post)
            <!-- First Blog Post -->
            <div class=" col-sm-12 post_container">
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="#">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{$post->updated_at}}</p>
            <hr>
            <img class="img-responsive mx-auto d-block" height="300" width="300" src="{{ URL::to('/images/' . $post->image) }}" alt="{{$post->image}}">
            <hr>
            <p>{!! str_limit($post->body, 20) !!}</p>
            <a class="btn btn-primary" href="{{route('home.post', $post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
                
            </div>    
          @endforeach
        @else
            <div class="col-md-12 text-center">
               <h1>No posts available</h1>
            </div>    
        @endif    
</div>
@stop