<?php

namespace App\Events;

use App\Models\Prestataire;
use App\Models\RapportIntervention;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use App\Models\RapportRemplacementPiece;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrestataireRapportsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public RapportIntervention $rapport_interventon;
    public RapportRemplacementPiece $rapportRemplacementPiece;

    /**
     * Create a new event instance.
     */
    public function __construct(public Prestataire $prestataire, $rapport, public $action)
    {
        if ($this->action == 'rapport_interventon') {
            $this->rapport_interventon = $rapport;
        } elseif ($this->action == 'rapportRemplacementPiece') {
            $this->rapportRemplacementPiece = $rapport;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
