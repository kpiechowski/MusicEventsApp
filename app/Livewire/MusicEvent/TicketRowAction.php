<?php

namespace App\Livewire\MusicEvent;

use App\Jobs\Ticket\GenerateTicketQrCode;
use App\Models\Ticket;
use Livewire\Component;

class TicketRowAction extends Component
{
    public Ticket $ticket;

    public string $state = 'active'; 


    public function removeTicket(){ // do optymalizacji i przemyślenia
        $this->ticket->delete();
        // $this->dispatch('rowDeleted');
        $this->state = 'removed';
    }

    public function generateQrCode() {
        GenerateTicketQrCode::dispatch([$this->ticket])->onQueue('qr_code_generation');
    }

    public function render()
    {
        return view('livewire.music-event.ticket-row-action');
    }
}
