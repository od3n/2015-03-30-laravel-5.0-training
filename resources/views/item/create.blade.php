<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@if (isset($item->id))
	{!! Form::open(['action' => 'ItemController@store']) !!}
@else
	{!! Form::open(['action' => 'ItemController@update', $item->id]) !!}
@endif
	<label>Description</label>
	{!! Form::text('name', ($item->id) ? $item->name : Input::get('name')) !!}
	<br />
	<label>Description</label>
	{!! Form::textarea('description', ($item->id) ? $item->description : Input::get('description')) !!}
	<br />
	<label>Active</label>
	{!! Form::checkbox('active', 1, ($item->id) ? ($item->active) ? true : false : Input::get('description')) !!}

	<br />
	{!! Form::submit() !!}

	</form>
	{!! Form::close() !!}


</body>
</html>