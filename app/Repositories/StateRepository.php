<?php


namespace App\Repositories;

use App\Repositories\Contracts\StateRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StateRepository implements StateRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'states';
    }

    public function getAllStates()
    {
       $state =  DB::table($this->table)->where('active', 1 )->get();
        return $state;
    }

    public function getCityStateByUuid(string $uuidState)
    {
        $state = DB::table($this->table)->where('uuid', $uuidState)->first();

        $cities = DB::table('cities_state')
                ->where('state_id',$state->id)
                ->where('active', 1)
                ->get();

        return $cities;
    }

    public function getCityByUuid(string $uuidState, string $uuid)
    {
        $state = DB::table($this->table)->where('uuid', $uuidState)->first();
        $city = DB::table('cities_state')
                ->where('state_id',$state->id)
                ->where('uuid', $uuid)
                ->where('active', 1)
                ->get();


        return $city;
    }
}