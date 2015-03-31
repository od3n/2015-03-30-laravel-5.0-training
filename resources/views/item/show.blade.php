<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{ $item->name }}<br />
{{ $item->description }}<br />
{{ $item->active }}

{!! link_to_route('item.index', 'Back to List') !!}

</body>
</html>