<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link href="https://fonts.bunny.net" rel="preconnect">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
	<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

		<header class="flex items-center justify-between gap-6 px-4 bg-gray-800 h-14">

			<x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />

			<div class="flex items-center">
				<x-dropdown align="right" width="48">
					<x-slot name="trigger">
						<button
							class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
							<div x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

							{{ auth()->user()->name }}

							<div class="ms-1">
								<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
									<path fill-rule="evenodd"
										d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
										clip-rule="evenodd" />
								</svg>
							</div>
						</button>
					</x-slot>

					<x-slot name="content">
						<x-dropdown-link :href="route('profile')" wire:navigate>
							{{ __('Profile') }}
						</x-dropdown-link>

						<!-- Authentication -->
						<button class="w-full text-start" wire:click="logout">
							<x-dropdown-link>
								{{ __('Log Out') }}
							</x-dropdown-link>
						</button>
					</x-slot>
				</x-dropdown>
			</div>
		</header>

		<div class="flex items-start justify-start">

			@include('admin.segments.navigation')
			{{-- <livewire:layout.navigation /> --}}

			<main class="w-full">
				<div class="px-6 py-12">

					@if (isset($header) && !empty($header))
						{{ $header }}
					@endif

					<div class="mx-auto mt-8">
						<div class="overflow-hidden text-white bg-gray-800 shadow-sm sm:rounded-lg">
							<div class="p-6 text-gray-100">
								{{ $slot }}
							</div>
						</div>
					</div>
				</div>
			</main>

		</div>

	</div>
</body>

</html>
