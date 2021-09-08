<?php

namespace App\Repositories\Contracts;

interface StateRepositoryInterface
{
    public function getAllStates();
    public function getStateByUuid(string $uuidState);
}

