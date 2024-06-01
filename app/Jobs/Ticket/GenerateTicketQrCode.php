<?php

namespace App\Jobs\Ticket;

use App\Events\QrGenForTicketResponse;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateTicketQrCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tickets;

    /**
     * Create a new job instance.
     */
    public function __construct($tickets)
    {
        //
        $this->tickets = $tickets;
    }


    private function generateQrCode(Ticket $ticket) {

        if(!$ticket || !$ticket instanceof Ticket) return;
        
        // $path = 'public/qr_codes/'. $ticket->id .'.png';
        $path = 'qr_codes/' . $ticket->music_event_id . "/". $ticket->id .'.png';

        $QR = QrCode::format('png')
                    ->size(300)
                    ->generate(route('tickets.show',$ticket));

        $ticket->qr_code_path = $path;
        $ticket->save();
        Storage::disk('local')->put($path, $QR);
        Log::info('generated');
        event(new QrGenForTicketResponse($ticket, true));
        Log::info('event?');


    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    if(empty($this->tickets)) return;
            
        foreach ($this->tickets as $ticket) {
            $this->generateQrCode($ticket);
        }

    }
}
