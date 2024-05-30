<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Artyści') }}
		</h2>
	</x-slot>

	@if (isset($artists) && !empty($artists))
		<div class="space-y-4">

			@foreach ($artists as $a)
				<div
					class="flex items-center justify-between gap-2 rounded shadow-md odd:bg-neutral-50 dark:bg-gray-600 odd:dark:bg-gray-700">

					<div class="px-4 py-4">
						<div>

						</div>
						<h2 class="mb-3">{{ $a->name }}</h2>
						<p>
							{{ $a->bio }}
						</p>

						<div class="flex items-center gap-2 mt-8">

							<x-primary-button type="link" url="{{ route('admin.artists.show', $a) }}">
								{{ __('View') }}
							</x-primary-button>

							<x-ghost-button type="link" url="{{ route('admin.artists.edit', $a) }}">
								{{ __('Edit') }}
							</x-ghost-button>
						</div>

					</div>

					<div class="min-h-40 aspect-square max-w-[200px] overflow-hidden rounded">
						<livewire:image class="object-cover w-full h-full" :src="$a->getProfileAvatar()" />
					</div>
				</div>
			@endforeach

		</div>
	@endif

</x-app-layout>
