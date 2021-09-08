<?php

namespace App\Services;

use App\Http\Requests\Api\StoreUpdateAddress;
use App\Http\Resources\AddressResource;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressService
{
    protected $addressService;
    public function __construct(AddressRepositoryInterface $addressService)
    {
        $this->addressService = $addressService;

    }

    public function store(StoreUpdateAddress $request, array $data)
    {
        $data = $request->except(['state', '_token']);

        $address =  $this->addressService->newAddressByIdentify($request->identify, $data);

        return (new AddressResource($address))
                    ->response()
                    ->setStatusCode(201);

    }

}
