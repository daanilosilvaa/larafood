<?php

namespace App\Services;

use App\Repositories\Contracts\{
    TableRepositoryInterface,
    TenantRepositoryInterface,
};

class TableService
{

    protected $tableRepository, $tenantRepository;

    public function __construct(
        TableRepositoryInterface $tableRepository,
        TenantRepositoryInterface $tenantRepository
    ) {
        
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid)
    {
       
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        
        return $this->tableRepository->getTableByTenantId($tenant->id);
    }

    public function getTableByUrl(string $identify)
    {
        return $this->tableRepository->getTableByIdentify($identify);
    }
}