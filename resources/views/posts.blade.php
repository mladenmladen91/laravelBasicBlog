@extends('layouts.blog-post')
@section('content')
  
       <!-- Blog Entries Column -->
        <div class="col-md-12">
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
            <img class="img-responsive mx-auto d-block" src="{{ URL::to('/images/' . $post->image) }}" height="300" width="300" alt="no_image">
            <hr>
            <p>{!! str_limit($post->body, 50) !!}</p>
            <a class="btn btn-primary" href="{{route('home.post', $post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
                
            </div>    
          @endforeach

            <!-- Pager -->
            
              <div class="col-sm-12 text-center">{{ $posts->links() }}</div>
           
        
  </div>
@stop