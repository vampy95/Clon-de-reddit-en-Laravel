@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
			  	<h2>{{ $post->title }}</h2>
			  	<p>{{ $post->description }}</p>
			  	<p>Posted {{ $post->created_at->diffForHumans() }}</p>
			</div>
		</div>

		<hr>
		
		@if( Auth::guest() )

			Please log in to your account to comment.

		@else
		
			<div class="col-md-12">

				<form action=" {{ route('create_comment_path', ['post' => $post->id]) }} " method="POST">

					{{ csrf_field() }}

					<div class="form-group">
						<label for="comment">Comment:</label>
						<textarea name="comment" rows="5" class="form-control" id="comment"></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Post comment</button>
					</div>

				</form>
			  	
			</div>

		@endif

@endsection
