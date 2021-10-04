<?php

namespace App\Services;

use App\Repositories\Contracts\StateRepositoryInterface;

class StateService
{
    private $repository;

    public function __construct(StateRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function getAllStates()
    {
        return $this->repository->getAllStates();
    }

    public function getCityStateByUuid(string $uuidState)
    {
        return $this->repository->getCityStateByUuid($uuidState);
    }
    public function getCityByUuid( string $uuidState, string $uuid)
    {
        return $this->repository->getCityByUuid($uuidState, $uuid);
    }
}