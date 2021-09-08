<?php

namespace App\Repositories\Contracts;


interface AddressRepositoryInterface
{
    public function newAddressByIdentify(array $data);
    public function getAddressByIdentify(int $identify);

}
