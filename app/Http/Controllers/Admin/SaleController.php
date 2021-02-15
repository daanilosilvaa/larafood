<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSale;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $repository;

    public function __construct(Sale $sale)
    {
        $this->repository = $sale;
        $this->middleware(['can:Vendas']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->repository->paginate();

        return view('admin.pages.sales.index' , compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateSale  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSale $request)
    {
        $this->repository->create($request->except('_token'));

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = $this->repository->where('id', $id)->first();

        if(!$sale)
            return redirect()->back();
        
        return view('admin.pages.sales.show', [
            'sale' =>$sale,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$sale = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateSale  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSale $request, $id)
    {
        if (!$sale = $this->repository->find($id)) {
            return redirect()->back();
        }
        $sale->update($request->all());

       return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$sale = $this->repository->find($id)) {
            return redirect()->back();
        }
        $sale->delete();

       return redirect()->route('sales.index');
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

        $sales = $this->repository
                                ->where(function($query) use ($request){
                                    if($request->filter) {
                                        $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                        $query->orWhere('identify', $request->filter); 
                                    }
                                })
                                ->paginate();
        return view('admin.pages.sales.index',compact('sales', 'filters'));

    }
}
