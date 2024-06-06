<x-app-layout>

	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			{{ __('Create new artist') }}
		</h2>
	</x-slot>

	<div class="max-w-xl mx-auto">

		{{-- @dump($errors->get('name')) --}}

		@if (Route::has('admin.artists.store'))
			<form action="{{ route('admin.artists.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="space-y-4">

					<div>
						<x-input-label for="name" :value="__('Name')" />
						<x-text-input class="block w-full mt-1" id="name" name="name" type="text" required autofocus
							autocomplete="name" />
						<x-input-error class="mt-2" :messages="$errors->get('name')" />
					</div>

					<div>
						<x-input-label for="bio" :value="__('Bio')" />
						<x-text-input class="block w-full mt-1" id="bio" name="bio" type="text" required autofocus
							autocomplete="bio" />
						<x-input-error class="mt-2" :messages="$errors->get('bio')" />
					</div>

					<div>

						<x-input-label for="profile_avatar" :value="__('Profile Avatar')" />
						<livewire:components.file-input class="mt-1" id="profile_avatar" name="profile_avatar" required />
						{{-- <x-file-input class="block w-full mt-1" id="profile_avatar" name="profile_avatar" required /> --}}
						<x-input-error class="mt-2" :messages="$errors->get('profile_avatar')" />

					</div>

				</div>

				<div class="flex items-center justify-between">

					<x-primary-button class="mt-8">
						{{ __('Add new') }}
					</x-primary-button>

					<x-ghost-button class="mt-8">
						{{ __('Back') }}
					</x-ghost-button>

				</div>

			</form>
		@endif

	</div>

</x-app-layout>
