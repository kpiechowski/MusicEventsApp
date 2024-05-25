<div>
	@if ($show)
		<form wire:submit="handleInputUpdate" method="POST">
			@csrf
			<input class="w-full text-input" name="{{ $field }}" type="text" value="{{ $value }}" wire:model="value">

			<x-primary-button class="mt-3">
				{{ __('Update') }}
			</x-primary-button>

		</form>
	@endif
</div>
