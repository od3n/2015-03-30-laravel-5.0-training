List

<ul>
@foreach ($items as $item)
	<li>{!! link_to_route('item.show', $item->name, [$item->id]) !!} {!! link_to_route('item.edit', 'Edit', [$item->id]) !!}</li>
@endforeach
</ul>