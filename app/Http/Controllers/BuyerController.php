<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBuyer = Buyer::all();
        // return view('', compact('dataBuyer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate = ([
            'name' => 'required',
            'address' => 'required',
        ]);

        Buyer::create([
            'name' => $request->name,
            'address' => $request->address,
            'no_telp' => $request->no_telp,
        ]);
        // return redirect()->route('');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataBuyer = Buyer::where('id', $id)->first();
        // return view('', compact('dataBuyer'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate = ([
            'name' => 'required',
            'address' => 'required',
        ]);

        Buyer::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'no_telp' => $request->no_telp,
        ]);
        // return redirect()->route('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Buyer::where('id', $id)->delete();
        // return redirect()->route('');
    }
}
