<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	{!! Form::open(['action' => 'ItemController@store']) !!}

	<label>Description</label>
	{!! Form::text('name', null) !!}
	<br />
	<label>Description</label>
	{!! Form::textarea('description', null) !!}
	<br />
	<label>Active</label>
	{!! Form::checkbox('active', 1, true) !!}

	<br />
	{!! Form::submit() !!}

	</form>
	{!! Form::close() !!}


</body>
</html>