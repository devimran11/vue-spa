<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'products' => $products
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:products,title',
            'price' => 'required|integer',
            'image' => 'required',
            // 'image' => 'required|image|max:2048',
            'description' => 'required',
            // 'category_id' => 'required',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($product->title);
        $product->price = $request->price;
        $product->description = $request->description;
        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/product'), $imageName);
            $product->image = '/storage/product/' . $imageName;
        }
        $product->$imageName;
        $product->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Product Saved Successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $product = Product::find($product);
        // return response()->json($product, 200);
        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json('failed', 404);
        }

        $product = Product::find($product);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:products,title, $product->id",
            'price' => 'required|integer',
            'image' => 'sometimes|nullable|image|max:2048',
            'description' => 'required',
            // 'category_id' => 'required',
        ]);
        $product->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'price' => $request->price,
            'description' => $request->description,
            // 'category_id' => $request->category_id,
        ]);
        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/product'), $imageName);
            $product->image = '/storage/product/' . $imageName;
            $product->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Updated sucessfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product) {
            $product->delete();

            return response()->json('success', 200);
        } else {
            return response()->json('failed', 404);
        }
    }
}
