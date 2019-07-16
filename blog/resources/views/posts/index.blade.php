<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
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