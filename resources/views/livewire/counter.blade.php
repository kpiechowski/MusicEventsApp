<div>
	{{-- If your happiness depends on money, you will never be happy with yourself. --}}
	<h2>
		Counter: {{ $count }}
	</h2>

	<button class="mr-2 text-xl" wire:click="increment">+</button>

	<button class="text-xl" wire:click="decrement">-</button>

	@if (isset($logs) && !empty($logs))

		<div class="space-y-4">
			@foreach ($logs as $log)
				<div class="{{ $log['type'] == '-' ? 'bg-red-100' : 'bg-green-100' }} rounded-md p-4 shadow"
					wire:key="{{ $log['count'] }}">
					{{ $log['count'] }} ----- {!! $log['date'] !!}
				</div>
			@endforeach
		</div>
	@endif
</div>
