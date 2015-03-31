List

<ul>
@foreach ($items as $item)
	<li>
	{!! link_to_route('item.show', $item->name, [$item->id]) !!}
	<br />	
	{!! link_to_route('item.edit', 'Edit', [$item->id]) !!}
	
	{!! link_to_route('item.delete', 'Delete', [$item->id], ['onclick' => "return confirm('Sure or not?')"]) !!}	
	</li>
@endforeach
</ul>