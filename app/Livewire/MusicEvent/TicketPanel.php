<?php

namespace App\Livewire\MusicEvent;

use App\Models\MusicEvent;
use App\Models\Ticket;
use Livewire\Component;

use Livewire\Attributes\On; 

class TicketPanel extends Component
{

    public MusicEvent $musicEvent; 

    public string $confirmInfo = "Are you sure you want to add new tickets?";

    public array $pools;
    public string | null $currentPool = null;

    public $tickets;
    
    public function generateTickets(int $amount){
        if (!$this->currentPool || empty($amount))
            return;


        Ticket::factory()->count($amount)->create([
            'music_event_id' => $this->musicEvent->id,
            'price' => 64,
            'user_id' => 1,
            'pool_name' => $this->currentPool,
        ]);


    }

    public function createNewPool() {
        $newPool = (string) count($this->pools) + 1;
        $this->pools[] = $newPool;

        $this->currentPool = $newPool;

    }


    public function getTicketsFromCurrentPool(){
        $this->tickets = $this->musicEvent->tickets()->where('pool_name', $this->currentPool)->orderBy('created_at', 'desc')->get();
    }

    // #[On('rowDeleted')] 
    // public function refresh() {

    // }



    public function mount(MusicEvent $musicEvent){
        $this->musicEvent = $musicEvent;
        $this->pools = $this->musicEvent->tickets()->distinct()->pluck('pool_name')->toArray();
        $this->currentPool = isset($this->pools[0]) ? $this->pools[0] : null;
        $this->tickets = $this->musicEvent->tickets()->orderBy('created_at', 'desc')->get();

    }

    public function render()
    {
        return view('livewire.music-event.ticket-panel', [
            'tickets' => $this->getTicketsFromCurrentPool(),
        ]);
    }
}
