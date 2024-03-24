<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDetailsale = DetailSale::all();
        // return view('', compact('dataDetailsale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate = ([
            'qty' => 'required',
            'total_product' => 'required',
        ]);

        Sale::create([
            'sale_id' => $request->sale_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'total_product' => $request->total_product,
            'subtotal' => $request->subtotal,
        ]);
        // return redirect()->route('');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailSale $detailSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataDetailsale = DetailSale::where('id', $id)->first();
        // return view('', compact('dataDetailsale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate = ([
            'qty' => 'required',
            'total_product' => 'required',
        ]);

        Sale::where('id', $id)->update([
            'sale_id' => $request->sale_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'total_product' => $request->total_product,
            'subtotal' => $request->subtotal,
        ]);
        // return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sale::where('id', $id)->delete();
         // return redirect()->route('');
    }
}
