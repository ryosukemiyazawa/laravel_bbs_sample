<form method="post" action="{{ url('/entryitem/create') }}">
	{{ csrf_field() }}

	<div class="form-group">
		<label>Title</label>
		<input type="text" name="Entry[title]" value="" class="form-control" />

	</div>

	<div class="form-group">
		<label>Body</label>
		<input type="text" name="Entry[body]" value="" class="form-control" />
	</div>

	<div class="form-group">
		<input type="submit" value="投稿" class="btn btn-primary" />
	</div>
</form>