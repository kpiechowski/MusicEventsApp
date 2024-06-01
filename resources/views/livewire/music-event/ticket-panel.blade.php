<div id='ticket-table w-full'>

	<div class="flex w-full items-center justify-between gap-3 rounded-none bg-gray-400 p-6 dark:bg-gray-700">

		<div class="">

			<x-primary-button type="button" wire:click="createNewPool">
				{{ __('Add new pool') }}
			</x-primary-button>

		</div>

		@if (isset($pools) && !empty($pools))
			<div class="w-[200px]">
				<select
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-300 dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="currentPool" name="currentPool" wire:model.live="currentPool">
					@foreach ($pools as $pool)
						<option value="{{ $pool }}" {{ $pool == $currentPool ? 'selected' : '' }}>
							{{ $pool }}
						</option>
					@endforeach
				</select>
			</div>
		@endif

	</div>

	<div class="flex w-full items-center justify-between gap-3 rounded-none bg-gray-400 p-6 dark:bg-gray-700">

		<div class="text-lg">
			Total tickets: {{ isset($tickets) ? count($tickets) : 0 }}
		</div>

		<div class="flex items-center justify-end gap-3">

			<x-primary-button type="button" wire:click="generateTickets(1)" wire:confirm="{{ $confirmInfo }}">
				{{ __('Add x1') }}
			</x-primary-button>

			<x-primary-button type="button" wire:click="generateTickets(5)">
				{{ __('Add x5') }}
			</x-primary-button>

			<x-primary-button type="button" wire:click="generateTickets(25)">
				{{ __('Add x25') }}
			</x-primary-button>
		</div>

	</div>

	@if (isset($tickets) && !empty($tickets))

		<div class="relative max-h-[600px] overflow-y-auto">
			<table class="w-full">
				<thead class="">
					<tr class="sticky top-0 bg-slate-800 [&>th]:px-4 [&>th]:py-2 [&>th]:text-left">
						<th>ID</th>
						<th>Pool Name</th>
						<th>Is Reserved</th>
						<th>Qr Code</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody class="">
					@foreach ($tickets as $ticket)
						<livewire:music-event.ticket-row-action :key="$ticket->id" wire:transition :$ticket />
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="mt-8 w-full py-8 text-center text-xl">
			{{ __('There is no tickets yet') }}
		</div>

	@endif

</div>
