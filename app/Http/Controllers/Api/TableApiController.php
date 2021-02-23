<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TableFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;
    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;   
      
    }

    public function tableByTenant(TableFormRequest $request)
    {

        // if (!$request->token_company) {
        //     return response()->json(['menssage' => 'Token Not Found'], 404);
        // }
        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResource::collection($tables);
      
    }

    public function show(TableFormRequest $request, $identify)
    {
        if (!$table = $this->tableService->getTableByUrl($identify)) {
            return response()->json(['message', 'Table not found'], 404);
        };

        return new TableResource($table);
    }
}
