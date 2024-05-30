<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
				 * Handle an incoming registration request.
				 */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['is_admin'] = 1;
        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('admin/dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
	<form wire:submit="register">
		<!-- Name -->
		<div>
			<x-input-label for="name" :value="__('Name')" />
			<x-text-input class="block w-full mt-1" id="name" name="name" type="text" wire:model="name" required autofocus
				autocomplete="name" />
			<x-input-error class="mt-2" :messages="$errors->get('name')" />
		</div>

		<!-- Email Address -->
		<div class="mt-4">
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input class="block w-full mt-1" id="email" name="email" type="email" wire:model="email" required
				autocomplete="username" />
			<x-input-error class="mt-2" :messages="$errors->get('email')" />
		</div>

		<!-- Password -->
		<div class="mt-4">
			<x-input-label for="password" :value="__('Password')" />

			<x-text-input class="block w-full mt-1" id="password" name="password" type="password" wire:model="password" required
				autocomplete="new-password" />

			<x-input-error class="mt-2" :messages="$errors->get('password')" />
		</div>

		<!-- Confirm Password -->
		<div class="mt-4">
			<x-input-label for="password_confirmation" :value="__('Confirm Password')" />

			<x-text-input class="block w-full mt-1" id="password_confirmation" name="password_confirmation" type="password"
				wire:model="password_confirmation" required autocomplete="new-password" />

			<x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
		</div>

		<div class="flex items-center justify-end mt-4">
			<a
				class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
				href="{{ route('login') }}" wire:navigate>
				{{ __('Already registered?') }}
			</a>

			<x-primary-button class="ms-4">
				{{ __('Register') }}
			</x-primary-button>
		</div>
	</form>
</div>
