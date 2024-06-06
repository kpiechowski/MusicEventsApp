<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rule;
use App\Models\TicketPool;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

new class extends Component {
    //

    public bool $showModal = false;
    public $musicEvent;

    // form
    public string $name = '';
    public $price;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('ticket_pools')->where('music_event_id', $this->musicEvent->id)],
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ];
    }

    public function createNewPool()
    {
        Gate::allowIf(fn(User $user) => $user->is_admin);

        $validated = $this->validate();

        $validated['music_event_id'] = $this->musicEvent->id;

        $ticketPool = TicketPool::create($validated);

        $this->showModal = false;
        $this->dispatch('ticket-pool-created', ['pool_id' => $ticketPool->id]);
    }

    // public function with(): array
    // {
    //     return [
    //             // 'posts' => Post::paginate(10),
    //         ];
    // }
}; ?>

<div>

	<x-primary-button type="button" wire:click="$set('showModal', true)">
		{{ __('Add new pool') }}
	</x-primary-button>

	@if ($showModal)
		<aside class="fixed top-0 left-0 z-20 flex items-center justify-center w-screen h-screen" wire:transition>
			<div class="absolute z-20 h-full w-full bg-gray-800/20 backdrop-blur-[10px]" wire:click="$set('showModal', false)">
			</div>
			<div class="z-30 w-[300px] rounded-lg bg-gray-600 p-6">

				<h3 class="mb-3 text-center">Add new ticket pool</h3>

				<form class="space-y-3" wire:submit="createNewPool">

					@csrf

					<div>
						<x-input-label for="name" :value="__('Event name')" />
						<x-text-input class="block w-full mt-1" id="event-name" name="event-name" type="text" value=""
							value="{{ $musicEvent->name }}" disabled required autofocus autocomplete="name" />
						{{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
					</div>

					<div>
						<x-input-label for="pool_name" :value="__('Pool name')" />
						<x-text-input class="block w-full mt-1" id="pool_name" name="pool_name" type="text" wire:model="name" required
							autofocus autocomplete="pool_name" />
						<x-input-error class="mt-2" :messages="$errors->get('pool_name')" />
					</div>

					<div>
						<x-input-label for="price" :value="__('Ticket price')" />
						<x-text-input class="block w-full mt-1" id="price" name="price" type="number" wire:model="price"
							step="0.01" min="0" placeholder="0.00" required autofocus autocomplete="price" />
						<x-input-error class="mt-2" :messages="$errors->get('price')" />
					</div>

					<x-primary-button class="mx-auto8 !mt-8">
						{{ __('Add new pool') }}
					</x-primary-button>

				</form>
			</div>

		</aside>
	@endif

</div>
