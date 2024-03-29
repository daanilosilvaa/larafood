<?php


namespace App\Services;

use App\Repositories\Contracts\{
  ClientRepositoryInterface,
    OrderRepositoryInterface,
    ProductRepositoryInterface,
    TableRepositoryInterface,
    TenantRepositoryInterface
};


class OrderService
{
    protected $orderRepository, $tenantRepository, $tableRepository, $productRepository; //$clientRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $tableRepository,
        // ClientRepositoryInterface $clientRepository,
        ProductRepositoryInterface $productRepository

    ) {
      $this->orderRepository = $orderRepository;
      $this->tenantRepository = $tenantRepository;
      $this->tableRepository = $tableRepository;
      // $this->clientRepository = $clientRepository;
      $this->productRepository = $productRepository;

    }
    public function ordersByClient()
    {
      $idClient  = $this->getClientIdByOrder();

      return $this->orderRepository->getOrdersByClientId($idClient);
    }

    public function getOrderByIdentify(string $identify)
    {
      return $this->orderRepository->getOrderByIdentify($identify);
    }

    public function createNewOrder(array $order)
    {
      $productsOrder = $this->getProductsByOrder($order['products'] ?? []);

      $identify = $this->getIdentifyOrder();
      $total = $this->getTotalOrder($productsOrder);
      $status = 'open';
      $tenatId = $this->getTenantIdByOrder($order['token_company']);
      $comment = isset($order['comment']) ? $order['comment'] : '';
      $clientId = $this->getClientIdByOrder();
      $tableId = $this->getTableIdByOrder($order['table'] ?? '');



      $order = $this->orderRepository->createNewOrder(
        $identify,
        $total,
        $status,
        $tenatId,
        $comment,
        $clientId,
        $tableId
      );

      $this->orderRepository->registerProductsOrder($order->id, $productsOrder);

      return $order;

    }

    private function getIdentifyOrder(int $qtyCaracters = 8)
    {
      $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

      $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));

      $numbers .= 1234567890;

      // $specialCharacters = str_shuffle('!@#$%*-');
      // $characters = $smallLetters.$numbers.$specialCharacters;

      $characters = $smallLetters.$numbers;

      $identify = substr(str_shuffle($characters), 0, $qtyCaracters);

      if ($this->orderRepository->getOrderByIdentify($identify)) {
          $this->getIdentifyOrder($qtyCaracters +1);
      }

      return $identify;

    }

    private function getProductsByOrder(array $productsOrder): array
    {

      $products = [];
      foreach($productsOrder as $productOrder)
      {
        $productOrder['identify'];
        $product = $this->productRepository->getProductByUuid($productOrder['identify']);

        array_push($products,[
          'id'    => $product->id,
          'qty'   => $productOrder['qty'],
          'price' => $product->price,
        ]);
      }

      return $products;

    }

    private function getTotalOrder(array $products): float
    {

      $total = 0;
      foreach($products as $product)
      {
        $total += ($product['price'] * $product['qty']);
      }
      return (float) $total;
    }

    private function getTenantIdByOrder(string $uuid)
    {
      $tenant = $this->tenantRepository->getTenantByUuid($uuid);
      return $tenant->id;
    }

    private function getTableIdByOrder(string $uuid = '')
    {
      if($uuid)
      {
        $table =  $this->tableRepository->getTableByUuid($uuid);
        return $table->id;
      }
        return '';
    }

    private function getClientIdByOrder()
    {
      return auth()->check() ? auth()->user()->id : '';


    }

    public function getOrderByTenantId(int $idTenant, string $status, string $date)
    {
        return $this->orderRepository->getOrderByTenantId($idTenant, $status);
    }

    public function updateStatusOrder(string $identify, string $status)
    {

    }


}
