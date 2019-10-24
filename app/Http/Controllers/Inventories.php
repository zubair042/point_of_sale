<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Inventory;
use Auth;
use DB;

class Inventories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory_detail = Inventory::all();
        return view('inventory/index')->with('inventory_detail',$inventory_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory/add_inventory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = new Inventory;
        $inventory->item_name = implode(",", $request->input('item_name'));
        $inventory->quantity = json_encode($request->input('quantity'));
        $inventory->foot = json_encode($request->input('foot'));
        $inventory->price = json_encode($request->input('price'));
        $inventory->discount = $request->input('discount');
        $inventory->pending_item = $request->input('pending_item');
        $total_price = array_sum($request->input('price'));

        $inventory->total_price = $total_price-$request->input('discount');
        $inventory->product_code = json_encode($request->input('product_code'));
        $inventory->created_by = Auth::user()->id;
        $inventory->save();
        return redirect('/inventory')->with('success',"Account created successfully");
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
    public function destroy()
    {
        $inventory_id = Inventory::find($_POST['id']);
        $inventory_id->delete();  
    }
}
