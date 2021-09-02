<?php

namespace App\Repositories;

use App\Models\AddressFull;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressRespository implements AddressRepositoryInterface
{

    protected $entity;

    public function __construct(AddressFull $address)
    {
        $this->entity = $address;
    }

    public function newAddressOrder(int $idOrder)
    {
        $data = [
            'order_id'  => $idOrder,

            'comment'     => isset($address['comment']) ? $address['comment'] : '',
        ];
        return  $this->entity->create($data);
    }
    public function getAddressByOrder(int $idOrder)
    {

    }
    public function getAddressByClient(int $idClient){

    }
    public function getAddressById(int $id){

    }
    public function getAddressByClientIdByOrderId(int $idOrder, int $idClient){

    }
}
