<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    //
    use WithFileUploads;

    public $id;
    public $class;
    public $name;

    public $file;
    public $preview;

    public function updatedFile()
    {
        $this->validate(['file' => 'image|max:10000']);

        if ($this->file) {
            $this->preview = $this->file->temporaryUrl();
        }
    }
}; ?>

<div class="flex items-center justify-between gap-12 mt-1">

	<label class="w-full" for="{{ $id }}">
		<div class="w-full bg-gray-800 border border-gray-500 rounded-md cursor-default w- material-icons-wrapper">
			<span class="mx-auto text-xl text-center material-icons">upload</span>
		</div>
	</label>
	<input class="text-input {{ $class }} hidden" id="{{ $id }}" name="{{ $name }}" type="file"
		wire:model.live="file">

	<div class="aspect-square w-[250px] shrink-0 rounded-md bg-gray-500">
		@if ($preview)
			<img class="object-contain object-center w-full h-full" src="{{ $preview }}" alt="Image Preview">
		@endif
	</div>
</div>
