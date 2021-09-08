<?php

namespace App\Repositories;

use App\Models\AddressFull;
use App\Models\CityState;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AddressRespository implements AddressRepositoryInterface
{

    protected $entity;

    public function __construct(AddressFull $address)
    {
        $this->entity = $address;

    }



     // identify pode ser uuidTenant, uuidClient ou identifyOrder
     public function newAddressByIdentify(array $data)
     {
        $cities = CityState::where('active', 1)->get();

        for ($i=0; $i < count($cities) ; $i++) {
           if ($data['city_id'] == $cities[$i]) {
            $this->entity->create($data);
              return;
           }
        }

    }
     public function getAddressByIdentify(int $identify)
     {

        return DB::table('addresses')->where('identify', $identify)->get();

     }
}
