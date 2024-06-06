<?php

namespace App\Livewire\MusicEvent;

use App\Models\User;
use App\Models\Ticket;
use Livewire\Component;

use App\Models\MusicEvent;
use App\Models\TicketPool;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Gate;
use App\Jobs\Ticket\GenerateTicketQrCode;
use Illuminate\Database\Eloquent\Collection;

class TicketPanel extends Component
{

    public $counter = 0;
    public MusicEvent $musicEvent; 

    public string $confirmInfo = "Are you sure you want to add new tickets?";

    public $pools;
    public TicketPool | Collection | null $currentPool = null;
    public int | null $currentPoolId = null;

    public $tickets;
    
    public function generateTickets(int $amount){
        if (!$this->currentPool || empty($amount))
            return;

        Gate::allowIf(fn(User $user) => $user->is_admin);

        Ticket::factory()->count($amount)->create([
            'music_event_id' => $this->musicEvent->id,
            'price' => 64,
            'user_id' => 1,
            'ticket_pool_id' => $this->currentPool->id,
        ]);


    }


    public function generateAllQrCodes() {
        
        GenerateTicketQrCode::dispatchAfterResponse($this->tickets);
    }

    public function removeCurrentPool() {
        if (!$this->currentPool)
            return;

        $this->currentPool->delete();
        $this->pools = $this->pools = $this->musicEvent->ticketPools()->get();
        $this->currentPool = $this->pools->first();
        if ($this->currentPool)
            $this->currentPoolId = $this->currentPool->id;

    }

    public function updatedCurrentPoolId(){
        if(!$this->currentPoolId) return;
        // dump($this->currentPoolId);
        $this->currentPool = TicketPool::find($this->currentPoolId);
        // dd($this->currentPool);
    }


    public function getTicketsFromCurrentPool(){
        if (!$this->currentPool)
            $this->tickets =  collect();

        $this->tickets = $this->currentPool->tickets()->orderBy('created_at', 'desc')->with('ticketPool')->get();
    }


    #[On('ticket-pool-created')] 
    public function ticketPoolCreated($pool_id) {
        if (!$pool_id)
            return;

        $this->currentPool = TicketPool::find($pool_id)->first();
        $this->pools = $this->musicEvent->ticketPools()->get();

        // dd($this->currentPool);
        $this->dispatch('$refresh');

    }


    public function mount(MusicEvent $musicEvent){
        $this->musicEvent = $musicEvent;
        $this->pools = $this->musicEvent->ticketPools()->get();
        $this->currentPool = $this->pools->first();
        if ($this->currentPool)
            $this->currentPoolId = $this->currentPool->id;

        // $this->tickets = $this->musicEvent->tickets()->orderBy('created_at', 'desc')->get();

    }

    public function render()
    {

        return view('livewire.music-event.ticket-panel', [
            'tickets' => $this->getTicketsFromCurrentPool(),
        ]);
    }
}
