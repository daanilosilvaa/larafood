<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCityState;
use App\Models\CityState;
use App\Models\State;
use Illuminate\Http\Request;

class CityStateController extends Controller
{
    protected $state , $repository;

    public function __construct(State $state, CityState $repository)
    {
        $this->state = $state;
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlState)
    {
        if(!$state = $this->state->where('url', $urlState)->first()){
            return redirect()->back();
        }

        // $details = $plan->details();

        $cities = $state->cities()->paginate();

        return view('admin.pages.states.cities.index', [
            'state'=> $state,
            'cities'=> $cities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlState)
    {
        if(!$state = $this->state->where('url', $urlState)->first()){
            return redirect()->back();
        }

       return view('admin.pages.states.cities.create',compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCityState $request, $urlState)
    {
        if(!$state = $this->state->where('url', $urlState)->first()){
            return redirect()->back();
        }

        $state->cities()->create($request->all());
        return redirect()->route('cities.state.index', [
            $state->url
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($urlState, $idCity)
    {
        $state = $this->state->where('url', $urlState)->first();
        $city = $this->repository->find($idCity);

        if(!$state || !$city){
            return redirect()->back();
        }

        return View('admin.pages.states.cities.show', [
            'state' => $state,
            'city' => $city,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlState, $idCity)
    {
        $state = $this->state->where('url', $urlState)->first();
        $city = $this->repository->find($idCity);

        if(!$state || !$city){
            return redirect()->back();
        }

        return View('admin.pages.states.cities.edit', [
            'state' => $state,
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $urlState, $idCity)
    {
        $state = $this->state->where('url', $urlState)->first();
        $city = $this->repository->find($idCity);

        if(!$state || !$city){
            return redirect()->back();
        }

        $city->update($request->all());
        return redirect()->route('cities.state.index',
        $state->url
    );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlState, $idCity)
    {
        //
    }
}
