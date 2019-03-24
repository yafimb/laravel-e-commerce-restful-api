<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Model\Review;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Response;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param ReviewRequest $request
     * @param Product $product
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(ReviewRequest $request, Product $product)
    {
        $review = new Review($request->all());
        $product->reviews()->save($review);

        return response(['data'=>new ReviewResource($review)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * @param Product $product
     * @param Review $review
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     * @throws \Exception
     */
    public function destroy(Product $product, Review $review)
    {
        $review->delete();
        return \response(null, Response::HTTP_NO_CONTENT);
    }
}
