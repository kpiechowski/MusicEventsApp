@if (null !== config('navigation'))
	<nav class="h-[calc(100vh-56px)] w-full max-w-[200px] space-y-1 border-t border-gray-900 bg-gray-800 pt-4">

		@foreach (config('navigation') as $nav)
			<div class="">

				<a
					class="{{ request()->routeIs($nav['routeGroup'] . '*') ? 'bg-gray-700' : '' }} flex w-full items-center justify-start gap-1 px-4 py-1 transition-all hover:bg-gray-700"
					href="{{ route($nav['route']) }}">

					<span class="w-8 text-xl text-gray-400 material-icons shrink-0">{{ $nav['icon'] }}</span>
					<div class="text-white">
						{{ __($nav['name']) }}
					</div>
				</a>

				@if (isset($nav['dropdown']))
					<div
						class="{{ request()->routeIs($nav['routeGroup'] . '*') ? 'flex' : 'hidden' }} w-full flex-col gap-2 bg-gray-600 py-1">

						@foreach ($nav['dropdown'] as $el)
							<a class="py-2 pl-8 text-sm text-gray-100 transition-all hover:underline" href="{{ route($el['route']) }}">
								{{ __($el['name']) }}
							</a>
						@endforeach

					</div>
				@endif

			</div>
		@endforeach

	</nav>

@endif
