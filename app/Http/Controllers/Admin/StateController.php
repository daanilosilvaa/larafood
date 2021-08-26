<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateState;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $repository;

    public function __construct(State $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $states = $this->repository->paginate();


        return view('admin.pages.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateState $request)
    {

       $this->repository->create($request->all());

       return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {

       if (!$state = $this->repository->where('url', $url)->first()) {
           return redirect()->back();
       }

       return view('admin.pages.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        if (!$state = $this->repository->where('url', $url)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if (!$state = $this->repository->find($id)) {
            return redirect()->back();
        }

        $state->update($request->all());
        return redirect()->route('states.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$state = $this->repository->find($id)) {
            return redirect()->back();
        }

        $state->delete();

        return redirect()->route('states.index');
    }

    /**
     * Search results
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $filters = $request->only('filter');

        $states = $this->repository
                                ->where(function($query) use ($request){
                                    if($request->filter) {
                                        $query->where('name', 'LIKE', "%{$request->filter}%");
                                    }
                                })
                                ->paginate();
        return view('admin.pages.states.index',compact('states', 'filters'));

    }
}
