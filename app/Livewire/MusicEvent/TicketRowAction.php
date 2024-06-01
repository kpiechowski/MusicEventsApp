<?php

namespace App\Livewire\MusicEvent;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Jobs\Ticket\GenerateTicketQrCode;

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
        GenerateTicketQrCode::dispatchAfterResponse([$this->ticket]);
        // GenerateTicketQrCode::dispatch([$this->ticket]);
    }

    #[On('echo:qr-generated,QrGenForTicketResponse')]
    public function onQrGenForTicketResponse($ticket, $is_success)
    {
        Log::info('eventBack');
        $this->dispatch('$refresh');
        if($this->ticket->id != $ticket->id)
            return;

         
    }

    public function render()
    {
        return view('livewire.music-event.ticket-row-action', [
            'QrCode' => $this->ticket->qr_code_path ?: null,
        ]);
    }
}
