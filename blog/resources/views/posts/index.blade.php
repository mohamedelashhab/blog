@extends('layouts.app')
@section('content')

<div class="container">
@foreach ($posts as $post)
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img class="media-object" src="http://placekitten.com/150/150">
  		</a>
  		<div class="media-body">
          <h4 class="media-heading">{{$post->title}}</h4>
          <p class="text-right">{{$post->user->name }}</p>
          <p>{{$post->body}}</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> {{$post->created_at->diffForHumans()}} </span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 
                <ul>
                    @foreach ($post->comments as $comment)
                        <li>{{$comment->body}}</li>
                    @endforeach
                </ul>
            </span>

			</ul>
       </div>
    </div>
    <div><a href="{{route('posts.edit', $post->id)}}">Update</a></div>
   
</div>

  @endforeach
</div>

@endsection