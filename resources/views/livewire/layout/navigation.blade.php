<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
				 * Log the current user out of the application.
				 */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="min-h-screen w-full max-w-[200px] shrink-0 border-t border-gray-900 bg-gray-800" x-data="{ open: false }">
	<!-- Primary Navigation Menu -->
	<div class="w-full px-4 space-y-8">

		@if (null !== config('navigation'))

			@foreach (config('navigation') as $nav)
				@if (isset($nav['dropdown']))
					<x-dropdown align="right" width="48">
						<x-slot name="trigger">
							<button
								class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
								{{ __($nav['name']) }}
								<div class="">
							</button>
						</x-slot>

						<x-slot name="content">
							@foreach ($nav['dropdown'] as $el)
								<x-dropdown-link :href="route($el['route'])" wire:navigate>
									{{ __($el['name']) }}
								</x-dropdown-link>
							@endforeach
						</x-slot>
					</x-dropdown>
				@else
					<x-nav-link :href="route($nav['route'])" :active="request()->routeIs($nav['route'])" wire:navigate>
						{{ __($nav['name']) }}
					</x-nav-link>
				@endif
			@endforeach
		@endif

	</div>

</nav>
