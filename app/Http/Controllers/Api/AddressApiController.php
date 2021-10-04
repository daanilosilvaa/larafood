<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateAddress;
use App\Http\Resources\AddressResource;
use App\Services\AddressService;

class AddressApiController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;

    }
    public function store(StoreUpdateAddress $request)
    {
        $data = $request->only('city_id',
            'identify',
            'district',
            'address',
            'complement'
        );

        $address =  $this->addressService
                            ->store($request->identifyOrder, $data);

        return (new AddressResource($address))
                    ->response()
                    ->setStatusCode(201);


    }

}
