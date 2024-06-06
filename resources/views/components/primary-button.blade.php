@props([
    'type' => 'submit',
    'action' => null,
    'url' => null,
])

@if ($type == 'link' && !empty($url))
	<a href="{{ $url }}" {{ $attributes->merge(['class' => 'button-input']) }}>
		{{ $slot }}
	</a>
@else
	<button type="{{ $type }}" {{ $attributes->merge(['class' => 'button-input']) }}>
		{{ $slot }}
	</button>
@endif
