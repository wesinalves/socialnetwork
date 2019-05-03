@extends('layouts.master')
@section('content')
	@include('includes.message-block')
	<section class="row new-post">
		<dir class="col-md-6 col-md-offset-3">
			<header><h3>
				What do you want to say
				<form action="{{route('post.create')}}" method="post">
					<div class="form-group">
						<textarea name="body" id="body" rows="5" placeholder="your post"class="form-control"></textarea>
					</div>
					<button type="submit" class="btn btn-primary" >Create Post</button>
					<input type="hidden" name="_token" value="{{Session::token()}}">
				</form> 
			</h3></header>
		</dir>
	</section>
	<section class="row posts">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What pet says</h3></header>
			@foreach($posts as $post)
				
        <article class="post" data-postid="{{ $post->id }}">
					<p>{{$post->body}}</p>
					<div class="info">Posted by {{$post->user->first_name}} on {{$post->created_at}}</div>
					<div class="interaction">
						<a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a>﻿ |
						<a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike' }}</a>
						@if(Auth::user() == $post->user)
							|
							<a href="#" class="edit">Edit</a> |
							<a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a> |
						@endif
						
					</div>
				</article>
        <div class='comment' id='commentsPost{{ $post->id }}'>
         
          <div class="form-group">
              <input type='text' name="comment" id="comment" class="form-control" placeholder="comment the post" >
              <input type='hidden' name="post_id" id="post_id" value="{{ $post->id }}">
              {{csrf_field()}}            
          </div>

          @foreach($post->comments()->where('post_id',$post->id)->get() as $comment)
            <p><span style="font-weight: bold">{{$comment->user()->first()->first_name}}</span> {{$comment->comment}}</p>
          @endforeach
      
        </div>
        
			@endforeach
		{{ $posts->links() }}	
		</div>

	</section>

<div class="modal" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label for="post-body">Edit the post</label>
        		<textarea name="post-body" id="post-body" rows=5 class="form-control"></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="post-save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php /*
<div class="modal" id="comment-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Comment Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="comments-body">
          
        </div>

        <form>
          <div class="form-group">
            <input type='text' name="post-comment" id="post-comment" class="form-control" placeholder="comment the post">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="comment-save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
*/ ?>
<script type="text/javascript">
	var token = '{{ Session::token() }}';
	var urlEdit = '{{route('edit')}}';
	var urlLike = '{{route('like')}}';
  var urlComment = '{{route('comment.create')}}';
</script>
@endsection