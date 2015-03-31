<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{ $item->name }}<br />
{{ $item->description }}<br />
{{ $item->active }}

	@if ($item->image)
		<br />
		{!! HTML::image('images/' . $item->image, $item->name, ['width' => 150, 'height' => 150]) !!}

	@endif
<br />
{!! link_to_route('item.index', 'Back to List') !!}

</body>
</html>