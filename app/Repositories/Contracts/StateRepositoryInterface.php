<?php

namespace App\Repositories\Contracts;

interface StateRepositoryInterface
{
    public function getAllStates();
    public function getCityStateByUuid(string $uuidState);
    public function getCityByUuid(string $uuidState, string $uuid);
}

