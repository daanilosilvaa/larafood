<?php

namespace App\Observers;

use App\Models\State;
use Illuminate\Support\Str;

class StateObserver
{
    /**
     * Handle the State "created" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function creating(State $state)
    {
        $state->url = Str::kebab($state->name);
        $state->initials = Str::upper($state->initials);
        $state->uuid = Str::uuid();
    }

    /**
     * Handle the State "updated" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function updating(State $state)
    {
        $state->url = Str::kebab($state->name);
        $state->initials = Str::upper($state->initials);
    }


}
