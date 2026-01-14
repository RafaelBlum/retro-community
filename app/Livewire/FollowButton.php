<?php

namespace App\Livewire;

use App\Models\Channel;
use Livewire\Component;

class FollowButton extends Component
{
    public Channel $channel;

    public function toggleFollow()
    {
        if(auth()->guest())
        {
            return redirect()->route('login');
        }

        auth()->user()->following()->toggle($this->channel->id);
    }

    public function render()
    {
        $isFollowing = auth()->check()
            ? auth()->user()->following()->where('channel_id', $this->channel->id)->exists()
            : false;

        return view('livewire.follow-button', [
            'isFollowing' => $isFollowing
        ]);
    }
}
