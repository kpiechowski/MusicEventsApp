<x-app-layout>

	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Upcoming events') }}
		</h2>
	</x-slot>

	<div class="space-y-4">
		@if (isset($events) && !empty($events))
			@foreach ($events as $ev)
				<div class="flex items-center justify-between mb-4">

					<h3 class="text-lg">
						{{ $ev->name }} | <span class="text-gray-700"> {{ $ev->start_date }} </span>
					</h3>

					{{-- @dd($ev) --}}
					<x-primary-button class="mt-8" type="link" url="{{ route('admin.music-events.show', $ev) }}">
						{{ __('Show') }}
					</x-primary-button>
				</div>
			@endforeach
		@endif
		{{-- </div> --}}

</x-app-layout>
