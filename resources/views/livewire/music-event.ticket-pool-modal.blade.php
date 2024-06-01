<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<aside>

	<div class="w-[300px]">
		<form action="">

			@csrf

			<div>
				<x-input-label for="name" :value="__('Name')" />
				<x-text-input class="mt-1 block w-full" id="name" name="name" type="text" required autofocus
					autocomplete="name" />
				<x-input-error class="mt-2" :messages="$errors->get('name')" />
			</div>

			<div>
				<x-input-label for="name" :value="__('Name')" />
				<x-text-input class="mt-1 block w-full" id="name" name="name" type="text" required autofocus
					autocomplete="name" />
				<x-input-error class="mt-2" :messages="$errors->get('name')" />
			</div>

			<div>
				<x-input-label for="name" :value="__('Name')" />
				<x-text-input class="mt-1 block w-full" id="name" name="name" type="text" required autofocus
					autocomplete="name" />
				<x-input-error class="mt-2" :messages="$errors->get('name')" />
			</div>

			<x-primary-button class="mt-8">
				{{ __('Add new') }}
			</x-primary-button>

		</form>
	</div>

</aside>
