<?php

namespace App\Livewire\MusicEvent;

use App\Models\MusicEvent;
use App\Models\Ticket;
use Livewire\Component;

use Livewire\Attributes\On; 

class TicketPanel extends Component
{

    public MusicEvent $musicEvent; 
    public int $amount = 0;

    public string $confirmInfo = "Are you sure you want to add new tickets?";
    
    public function generateTickets(int $amount){
        $this->amount = $amount;

        Ticket::factory()->count($amount)->create([
            'music_event_id' => $this->musicEvent->id,
            'price' => 64,
            'user_id' => 1,
            'pool_name' => 'pierwsza',
        ]);

    }


    // #[On('rowDeleted')] 
    // public function refresh() {

    // }

    public function mount(MusicEvent $musicEvent){
        $this->musicEvent = $musicEvent;
    }

    public function render()
    {
        return view('livewire.music-event.ticket-panel', ['tickets' => Ticket::orderBy('created_at', 'desc')->get()] );
    }
}
