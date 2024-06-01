{{-- <div> --}}
{{-- @if (isset($ticket) && !empty($ticket)) --}}
<tr
	class="odd:bg-gray-600/85 {{ $state == 'removed' ? 'hidden' : '' }} w-full border-b border-gray-700 bg-gray-600 text-gray-200 [&>td]:px-4 [&>td]:py-2">
	<td class="text-nowrap w-[250px] max-w-[250px] overflow-hidden text-ellipsis">{{ $ticket->id }}</td>
	<td> {{ $ticket->pool_name }} </td>
	<td> {{ $ticket->reserved ? 'Yes' : 'No' }} </td>

	<td>
		@if (!empty($QrCode))
			<a class="material-icon-wrapper block" href="{{ route('tickets.download-qr-code', $ticket) }}" target="_blank">
				<span class="material-icons action">download_2</span>
			</a>
		@else
			--
		@endif
	</td>

	<td class="inline-flex min-w-[100px] items-center justify-start gap-2">

		<button class="material-icon-wrapper" wire:click="generateQrCode"
			wire:confirm="This will generate and store QR code for this ticket. Proceed?">
			<span class="material-icons action">qr_code</span>
		</button>

		<button class="material-icon-wrapper" wire:click="removeTicket"
			wire:confirm="Are you sure you want to remove this ticket?">
			<span class="material-icons danger">delete_forever</span>
		</button>
	</td>
</tr>
{{-- @endif --}}

{{-- </div> --}}
