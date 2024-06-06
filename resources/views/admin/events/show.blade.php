<x-app-layout>

	{{-- @dump($musicEvent) --}}
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ $musicEvent->name }}
		</h2>
	</x-slot>

	<div class="w-full text-lg">
		{{ __('Start date: ') . $musicEvent->start_date }}
	</div>

	<livewire:music-event.ticket-panel :$musicEvent />

</x-app-layout>
