<?php

namespace App\Listeners;

use App\Events\QrGenForTicketResponse;
use Illuminate\Support\Str;
use App\Events\SlugUpdateAfterName;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetTicketQrGenResponse
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(QrGenForTicketResponse $event): void
    {
// 

        Log::info('listener');
    }
}
