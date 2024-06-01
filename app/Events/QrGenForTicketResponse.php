<?php

namespace App\Events;

use App\Models\Ticket;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QrGenForTicketResponse implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $ticket;
    private $is_generated;

    /**
     * Create a new event instance.
     */
    public function __construct(Ticket $ticket, bool $is_generated)
    {
        //
        Log::info('event construct');
        $this->ticket = $ticket;
        $this->is_generated;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        Log::info('broadcasted');

        return [
            new PrivateChannel('qr-generated'),
        ];
    }
}
