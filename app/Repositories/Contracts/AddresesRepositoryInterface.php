<?php

namespace App\Repositories\Contracts;


interface AddressRepositoryInterface
{


    public function newAddressOrder(int $idOrder);
    public function getAddressByOrder(int $idOrder);
    public function getAddressByClient(int $idClient);
    public function getAddressById(int $id);
    public function getAddressByClientIdByOrderId(int $idOrder, int $idClient);



}
