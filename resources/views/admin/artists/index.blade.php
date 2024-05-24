<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Artyści') }}
		</h2>
	</x-slot>

	@if (isset($artists) && !empty($artists))
		<div>

			@foreach ($artists as $a)
				{{-- @dump($a) --}}
				<div class="flex items-center justify-start gap-2 py-2 odd:bg-neutral-50">
					<img class="h-auto w-24" src="{{ $a->profile_avatar }}" alt="">
					{{ $a->name }}
				</div>
			@endforeach

		</div>
	@endif

</x-app-layout>
