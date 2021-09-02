<?php

namespace App\Observers;

use App\Models\AddressFull;

class AddressObserver
{
    /**
     * Handle the AddressFull "created" event.
     *
     * @param  \App\Models\AddressFull  $addressFull
     * @return void
     */
    public function creating(AddressFull $addressFull)
    {
       $addressFull['identify'] = auth()->user()->tenant_id;


    }

    /**
     * Handle the AddressFull "updated" event.
     *
     * @param  \App\Models\AddressFull  $addressFull
     * @return void
     */
    public function updated(AddressFull $addressFull)
    {
        //
    }


}
