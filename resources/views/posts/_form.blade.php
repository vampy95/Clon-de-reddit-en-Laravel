@if( $post->exists )

	<form action=" {{ route('update_post_path', ['post' => $post->id]) }} " method="POST">

	{{ method_field('PUT') }}

@else 

	<form action=" {{ route('store_post_path') }} " method="POST">

@endif

	{{ csrf_field() }}

		<div class="form-group">
			
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value=" {{ $post->title }} "/>

		</div>

		<div class="form-group">
			
			<label for="description">Description:</label>
			<textarea rows="5" name="description" class="form-control">{{ $post->description }}</textarea>

		</div>

		<div class="form-group">
			
			<label for="url">Url:</label>
			<input type="text" name="url" class="form-control" value=" {{ $post->url }} "/>

		</div>

		<div class="form-group">
			
			<button type="submit" name="" class="btn btn-primary">Save Post</button>

		</div>

	</form>