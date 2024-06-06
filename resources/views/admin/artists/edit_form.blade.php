<x-app-layout>

	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{!! __('Edit&nbsp;->&nbsp;' . $artist->name) !!}
		</h2>
	</x-slot>

	<div class="max-w-xl mx-auto">

		<form action="{{ route('admin.artists.update', $artist) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="w-full mb-8 overflow-hidden rounded-xl">

				<livewire:components.file-input class="mt-1" id="profile_avatar" name="profile_avatar"
					preview="{{ $artist->getProfileAvatar() }}" />

				{{-- <livewire:image class="h-auto w-[200px]" :src="$artist->getProfileAvatar()" /> --}}
			</div>

			<div class="space-y-4">

				<div>
					<x-input-label for="name" :value="__('Name')" />
					<x-text-input class="block w-full mt-1" id="name" name="name" type="text"
						value="{!! $artist->name !!}" required autofocus autocomplete="name" />
					<x-input-error class="mt-2" :messages="$errors->get('name')" />
				</div>
				<div>
					<x-input-label for="bio" :value="__('Bio')" />
					<x-textarea-input class="block w-full mt-1" id="bio" name="bio" type="text" rows=5 :value="$artist->bio"
						required autofocus autocomplete="bio" />
					<x-input-error class="mt-2" :messages="$errors->get('bio')" />
				</div>

				{{-- @foreach ($artist->editable as $field => $eventName)
						<div>
							<x-input-label :for="$field" :value="__($field)" />
							<livewire:components.model-edit-input :model="$artist" :field="$field" :eventName="$eventName" />
						</div>
						@endforeach --}}
			</div>
			<x-primary-button class="mt-8 action">
				{{ __('Save changes') }}
			</x-primary-button>
		</form>

	</div>

</x-app-layout>
