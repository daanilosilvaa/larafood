<?php

namespace App\Repositories\Contracts;


interface OrderRepositoryInterface
{

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenatId,
        string $comment = '',
        $clientId = '',
        $tableId = ''

    );
    public function getOrderByIdentify(string $identify);
    public function registerProductsOrder(int $ordeId, array $products);
    public function getOrdersByClientId(int $idClient);
    

}