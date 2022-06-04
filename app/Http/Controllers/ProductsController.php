<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['product'] = Product::all();
        return view('admin.product.product_list')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|min:5',
            'product_price' => 'required|numeric',
            'product_model_num' => 'required',
            'product_tax' => 'required|numeric',
        ]);
        //$product = new Product;
        $product = Product::create($request->all());
        return redirect('product')->with('success','Product Added Successfully');
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
        $arr['product'] = Product::find($id);
        return view('admin.product.product_edit')->with($arr);
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
        $request->validate([
            'product_name' => 'required|min:5',
            'product_price' => 'required|numeric',
            'product_model_num' => 'required',
            'product_tax' => 'required|numeric',
        ]);
        
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_model_num = $request->product_model_num;
        $product->product_tax = $request->product_tax;
        
        if($product->save()){
            return redirect('product')->with('success','Product Updated Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        //print_($product);
        return view('admin.product.delete_product', compact('product'));
    }
}
