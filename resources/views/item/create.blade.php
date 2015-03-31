<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@if ($errors->any())
	@foreach ($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
@endif

@if (!isset($item->id))
	{!! Form::model(new \App\Item, ['route' => 'item.store', 'enctype' => 'multipart/form-data']) !!}
@else
	{!! Form::model($item, ['method' => 'patch', 'route' => ['item.update', $item->id], 'enctype' => 'multipart/form-data']) !!}
@endif

	<label>Name</label>
	{!! Form::text('name', ($item->id) ? $item->name : Input::get('name')) !!}
	<br />
	<label>Description</label>
	{!! Form::textarea('description', ($item->id) ? $item->description : Input::get('description')) !!}
	{{ $errors->first('description') }}
	<br />
	<label>Active</label>
	{!! Form::checkbox('active', 1, ($item->id) ? ($item->active) ? true : false : Input::get('description')) !!}
	<br />
	<label>Image</label>
	{!! Form::file('image', null) !!}

	@if ($item->image)
		<br />
		{!! HTML::image('images/' . $item->image, $item->name, ['width' => 150, 'height' => 150]) !!}
		<br />
		<label>Remove</label>
		{!! Form::checkbox('remove', 1, false) !!}

	@endif

	<br />
	{!! Form::submit() !!}

	</form>
	{!! Form::close() !!}

@if (isset($item->id))
	{!! link_to_route('item.index', 'Back to List') !!}
@endif

</body>
</html>