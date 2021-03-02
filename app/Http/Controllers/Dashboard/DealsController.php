<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Deal;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Deal\CreateRequest;
use App\Http\Requests\Admin\Deal\UpdateRequest;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals=Deal::latest()->get();
        return view('Dashboard.deals.index',compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::all();
        return view('Dashboard.deals.create',compact('suppliers'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $product=Product::find($request->input('product_id'));
        if(!$product){
            return redirect()->back()->with('error','Error Product Not Found');
        }
        $deal=new Deal;
        $deal->product_id = $product->id;
        $deal->discount_type = $request->input('discount_type');
        $deal->discount_value = $request->input('discount_value');
        if ($request->input('discount_type') == 'precentage') {
            $deal->price_after = $product->price - (($product->price / 100.00) * $request->input('discount_value'));
        }
        if ($request->input('discount_type') == 'amount') {
            $deal->price_after = $product->price - $request->input('discount_value');
        }
        $deal->supplier_id = $request->input('supplier_id');
        $deal->price_before=$
        $deal->save();
        return redirect(route('admin.deals.index'))->with('Deal','Banner Has Been Added Successfully');
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
        $deal=Deal::findOrFail($id);
        $suppliers=Supplier::all();
        return view('Dashboard.deals.create',compact('suppliers',));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $product=Product::find($request->input('product_id'));
        if(!$product){
            return redirect()->back()->with('error','Error Product Not Found');
        }
        $deal=Deal::findOrFail($id);
        $deal->product_id = $product->id;
        $deal->discount_type = $request->input('discount_type');
        $deal->discount_value = $request->input('discount_value');
        if ($request->input('discount_type') == 'precentage') {
            $deal->price_after = $product->price - (($product->price / 100.00) * $request->input('discount_value'));
        }
        if ($request->input('discount_type') == 'amount') {
            $deal->price_after = $product->price - $request->input('discount_value');
        }
        $deal->supplier_id = $request->input('supplier_id');
        $deal->price_before=$
        $deal->save();
        return redirect()->back()->with('success','Deal Has Been Updated Successfully');
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
