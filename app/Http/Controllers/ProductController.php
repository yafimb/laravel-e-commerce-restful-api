<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {

        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param ProductRequest $request
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name      = $request->name;
        $product->stock     = $request->stock;
        $product->price     = $request->price;
        $product->detail    = $request->description;
        $product->discount  = $request->discount;
        $product->save();

        return response(['data' => new ProductResource($product)],Response::HTTP_CREATED);
    }

    /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * @param Product $product
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->ProductUserCheck($product);

        $request['detail'] = $request['description'];
        unset($request['description']);

        $product->update($request->all());
        return \response(['data' => new ProductResource($product)], Response::HTTP_ACCEPTED);

    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $this->ProductUserCheck($product);

        $product->delete();
        return \response(['data' => null], Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $product
     */
    public function ProductUserCheck($product)
    {
        if(Auth::id() != $product->id)
        {
            throw new ProductNotBelongToUserException;
        }

    }

}
