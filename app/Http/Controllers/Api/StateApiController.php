<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\{
    CityResource,
    StateResource
};
use App\Services\StateService;
use Illuminate\Http\Request;

class StateApiController extends Controller
{
    protected $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;

    }

    public function index ()
    {
        return StateResource::collection($this->stateService->getAllStates());
    }

    public function cities($uuidState)
    {
        return CityResource::collection($this->stateService->getStateByUuid($uuidState));
    }

}
