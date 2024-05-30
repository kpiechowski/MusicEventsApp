<div>
	@if ($show)
		<form wire:submit="handleInputUpdate" method="POST">
			@csrf
			<input class="w-full text-input" name="{{ $field }}" type="text" value="{{ $value }}" wire:model="value">

			<x-primary-button class="mt-3">
				{{ __('Update') }}
			</x-primary-button>

			<div class="w-full mt-3 text-slate-700">
				{{ $response }}
			</div>

		</form>
	@endif
</div>
