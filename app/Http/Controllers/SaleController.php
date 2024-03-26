<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSale = Sale::all();
        return view('pages.sale.index', compact('dataSale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate = ([
            'date' => 'required',
            'total_price' => 'required',
        ]);

        Sale::create([
            'date' => $request->date,
            'total_price' => $request->total_price,
            'buyer_id' => $request->buyer_id,
        ]);
        // return redirect()->route('');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataSale = Sale::where('id', $id)->first();
        // return view('', compact('dataSale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate = ([
            'date' => 'required',
            'total_price' => 'required',
        ]);

        Sale::where('id', $id)->update([
            'date' => $request->date,
            'total_price' => $request->total_price,
            'buyer_id' => $request->buyer_id,
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
