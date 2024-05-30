<?php

namespace App\Jobs\Ticket;

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
        Log::info('in construct');
        $this->tickets = $tickets;
    }


    private function generateQrCode(Ticket $ticket) {

        if(!$ticket || !$ticket instanceof Ticket) return;

        // $path = 'public/qr_codes/'. $ticket->id .'.png';
        $path = 'qr_codes/' . $ticket->music_event_id . "/". $ticket->id .'.png';

        $QR = QrCode::format('png')
                    ->size(300)
                    ->generate($ticket->id);

            

        Storage::disk('local')->put($path, $QR);
    }



    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // Log::info($this->tickets);
        Log::info('in handle');
        if(empty($this->tickets)) return;
        
        foreach ($this->tickets as $ticket) {
            Log::info('Ticket: '. $ticket->id);
            $this->generateQrCode($ticket);
        }

    }
}
