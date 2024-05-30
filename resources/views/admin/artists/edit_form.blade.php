<x-app-layout>

	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{!! __('Edit&nbsp;->&nbsp;' . $artist->name) !!}
		</h2>
	</x-slot>

	<div class="mx-auto max-w-xl">

		{{-- @dump($artist->editable) --}}

		<div class="mb-8 w-full overflow-hidden rounded-xl">
			<livewire:image :src="$artist->getProfileAvatar()" />
		</div>

		<div class="space-y-4">
			@foreach ($artist->editable as $field => $eventName)
				<div>
					{{-- @dd($eventName) --}}
					<x-input-label :for="$field" :value="__($field)" />
					<livewire:components.model-edit-input :model="$artist" :field="$field" :eventName="$eventName" />

					{{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
				</div>
			@endforeach
		</div>

	</div>

</x-app-layout>
