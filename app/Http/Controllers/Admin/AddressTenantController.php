<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressFull;
use App\Models\State;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AddressTenantController extends Controller
{
    protected $repository, $tenant;

    public function __construct(AddressFull $repository ,Tenant $tenant)
    {
        $this->tenant = $tenant;
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlTenant)
    {
        if (!$tenant = $this->tenant->where('url', $urlTenant)->first()) {
            return redirect()->back();
        }

        $addresses = $tenant->addresses()->paginate();

        return view('admin.pages.tenants.addresses.index', compact(['tenant','addresses']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlTenant)
    {
        $states = State::where('active', 1)->with('cities')->get();

        if (!$tenant = $this->tenant->where('url', $urlTenant)->first()) {
            return redirect()->back();
        }

       return view('admin.pages.tenants.addresses.create', compact('tenant','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
