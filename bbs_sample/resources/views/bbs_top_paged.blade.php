@extends('layout.common')

@section('content')
<div class="container mt-3">
	<div class="row">
		@foreach ($items as $item)
		<div class="col col-sm-12 mb-3">
			<div class="card">
				<h5>{{ $item->title }}</h5>
				<div class="card-body">
					{{ $item->body }}
				</div>
			</div>
		</div>
		@endforeach

		{{ $items->links() }}
	</div>
</div>

<div class="container mt-3">
	<h3>投稿フォーム</h3>
	@include('part.bbs_form')
</div>

@endsection