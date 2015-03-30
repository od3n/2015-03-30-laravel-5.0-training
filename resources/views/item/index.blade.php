List

<ul>
@foreach ($items as $item)
	<li>{{ $item->name }}</li>
@endforeach
</ul>