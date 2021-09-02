<?php

namespace App\Services;

class AddressService
{
    protected $evaluationService;
    public function __construct(EvaluationService $addressService)
    {
        $this->addressService = $addressService;

    }

    public function store(StoreEvaluationOrder $request)
    {
        $data = $request->only('stars', 'comment');

        $address =  $this->addressService
                            ->createNewEvaluation($request->identifyOrder, $data);

        return (new AddressResource($address))
                    ->response()
                    ->setStatusCode(201);


    }

}
