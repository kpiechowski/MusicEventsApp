<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
				 * Handle an incoming authentication request.
				 */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
	<!-- Session Status -->
	<x-auth-session-status class="mb-4" :status="session('status')" />

	<form wire:submit="login">
		<!-- Email Address -->
		<div>
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input class="block w-full mt-1" id="email" name="email" type="email" wire:model="form.email" required
				autofocus autocomplete="username" />
			<x-input-error class="mt-2" :messages="$errors->get('form.email')" />
		</div>

		<!-- Password -->
		<div class="mt-4">
			<x-input-label for="password" :value="__('Password')" />

			<x-text-input class="block w-full mt-1" id="password" name="password" type="password" wire:model="form.password"
				required autocomplete="current-password" />

			<x-input-error class="mt-2" :messages="$errors->get('form.password')" />
		</div>

		<!-- Remember Me -->
		<div class="block mt-4">
			<label class="inline-flex items-center" for="remember">
				<input
					class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
					id="remember" name="remember" type="checkbox" wire:model="form.remember">
				<span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
			</label>
		</div>

		<div class="flex items-center justify-end mt-4">
			@if (Route::has('password.request'))
				<a
					class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
					href="{{ route('password.request') }}" wire:navigate>
					{{ __('Forgot your password?') }}
				</a>
			@endif

			<x-primary-button class="ms-3">
				{{ __('Log in') }}
			</x-primary-button>
		</div>
	</form>
</div>
