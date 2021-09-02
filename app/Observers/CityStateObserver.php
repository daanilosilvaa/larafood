<?php

namespace App\Observers;

use App\Models\CityState;
use Illuminate\Support\Str;

class CityStateObserver
{
    /**
     * Handle the CityState "created" event.
     *
     * @param  \App\Models\CityState  $cityState
     * @return void
     */
    public function creating(CityState $cityState)
    {
         $cityState->uuid = Str::uuid();
    }

    /**
     * Handle the CityState "updated" event.
     *
     * @param  \App\Models\CityState  $cityState
     * @return void
     */
    public function updating(CityState $cityState)
    {
         $cityState->uuid = Str::uuid();
    }


}
