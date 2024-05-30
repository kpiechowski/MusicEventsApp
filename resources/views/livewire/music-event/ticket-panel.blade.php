<div id='ticket-table w-full'>

	<div class="flex items-center justify-between w-full gap-3 p-6 bg-gray-400 rounded-md rounded-b-none dark:bg-gray-700">

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

	<div class="relative max-h-[600px] overflow-y-auto">
		<table class="w-full">
			<thead class="">
				<tr class="sticky top-0 bg-slate-800 [&>th]:px-4 [&>th]:py-2 [&>th]:text-left">
					<th>ID</th>
					<th>Pool Name</th>
					<th>Is Reserved</th>
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

</div>
