<?php

namespace App\Http\Controllers\Resources;

use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "products" => Product::all()
        ];
        return view('resources.products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view("resources.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  storeProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {

        $product = new Product([
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'unity' => $request->get('unity'),
            'unity_price' => $request->get('unity_price'),
            'description' => $request->get('description'),
        ]);
        $product->save();

        return back()->withSuccess("Creation reussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return  view("resources.products.edit")->with("product",$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  updateProductRequest$request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name ?? $product->name,
            'quantity' => $request->quantity ?? $product->quantity,
            'price' => $request->price ?? $product->price,
            'unity' => $request->unity ?? $product->unity,
            'unity_price' => $request->unity_price ?? $product->unity_price,
            'description' => $request->description ?? $product->description,
        ]);

        return redirect()
        ->route('products.index')
        ->withSuccess("Mise a jour realiser avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
        ->route('products.index')
        ->withSuccess("Suppression realiser avec success");
    }
}
