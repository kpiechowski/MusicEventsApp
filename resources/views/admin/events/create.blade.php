<x-app-layout>

	{{-- @dump($musicEvent) --}}
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
			Create new music event
		</h2>
	</x-slot>

	<div class="w-full max-w-xl mx-auto">

		@if (Route::has('admin.music-events.store'))
			<form action="{{ route('admin.music-events.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="space-y-4">

					<div>
						<x-input-label for="name" :value="__('Name')" />
						<x-text-input class="block w-full mt-1" id="name" name="name" type="text" required autofocus
							autocomplete="name" />
						<x-input-error class="mt-2" :messages="$errors->get('name')" />
					</div>

					<div>
						<x-input-label for="place" :value="__('Place')" />
						<x-text-input class="block w-full mt-1" id="place" name="place" type="text" required autofocus
							autocomplete="place" />
						<x-input-error class="mt-2" :messages="$errors->get('place')" />
					</div>

					<div>
						<x-input-label for="profile_avatar" :value="__('Poster')" />
						<x-file-input class="block w-full mt-1" id="profile_avatar" name="profile_avatar" required />
						<x-input-error class="mt-2" :messages="$errors->get('profile_avatar')" />
					</div>

				</div>

				<div class="flex items-center justify-between">

					<x-primary-button class="mt-8 action">
						{{ __('Add new') }}
					</x-primary-button>

					<x-primary-button class="mt-8">
						{{ __('Back') }}
					</x-primary-button>

				</div>

			</form>
		@endif

	</div>

</x-app-layout>
