<div class="w-full mt-4" id='ticket-table'>

	<div
		class="flex items-center justify-between w-full gap-3 p-6 bg-gray-400 border-b border-gray-900 rounded-none dark:bg-gray-700">

		<div class="">
			{{-- @dd($musicEvent) --}}
			<livewire:music-event.ticket-pool-modal :$musicEvent />
		</div>

		@if (isset($pools) && !empty($pools))
			<div class="w-[200px]">
				<select
					class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-300 dark:text-black dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
					id="currentPoolId" name="currentPoolId" wire:model.change="currentPoolId">
					@foreach ($pools as $pool)
						<option value="{{ $pool->id }}">
							{{ $pool->name }}
						</option>
					@endforeach
				</select>
			</div>

			{{-- @dump($currentPool) --}}
		@endif

	</div>

	@if (isset($currentPool) && !empty($currentPool))
		<div class="flex justify-between gap-4 p-6 bg-gray-400 border-b border-gray-900 rounded-none dark:bg-gray-700">

			<div class="text-lg">
				Current pool: {{ $currentPool->name }}
			</div>

			<div class="flex items-center justify-end gap-3">

				<button class="material-icon-wrapper" title="publish this pool to sell" wire:click="publishCurrentPool"
					wire:confirm="This will generate and store QR code for this ticket. Proceed?">
					<span class="material-icons green">publish</span>
				</button>

				<button class="material-icon-wrapper" title="generate all qr codes" wire:click="generateAllQrCodes"
					wire:confirm="This will generate and store QR code for this ticket. Proceed?">
					<span class="material-icons action">qr_code</span>
				</button>

				<button class="material-icon-wrapper" title="remove current pool with tickets" wire:click="removeCurrentPool"
					wire:confirm="Are you sure you want to remove this pool with tickets">
					<span class="material-icons danger">layers_clear</span>
				</button>

			</div>
		</div>

		<div class="flex items-center justify-between w-full gap-3 p-6 bg-gray-400 rounded-none dark:bg-gray-700">

			<div class="text-lg">

				<div>
					Total tickets: {{ isset($tickets) ? count($tickets) : 0 }}
				</div>
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
	@endif

	@if (isset($tickets) && $tickets->isNotEmpty())
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
						<livewire:music-event.ticket-row-action :key="$ticket->id" :$ticket />
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="w-full py-8 mt-8 text-xl text-center">
			{{ __('There is no tickets yet') }}
		</div>

	@endif

</div>
