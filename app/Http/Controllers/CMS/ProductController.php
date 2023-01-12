<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\User\Category;
use App\Models\User\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::search()->paginate(5);

        return view('cms/product/index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('cms/product/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();
        $products = new Product();
        $products->fill($data);

        $products->save();

        $products->categories()->attach($request->category);
        if ($request->hasFile('list_image')) {
            foreach ($request->file('list_image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('uploads/'), $imageName);
                $files = $imageName;

                $products->galeries()->create([
                    'product_id' => $products->id,
                    'thumbnail' => $files,
                ]);
            }
        }

        return redirect('products/index');
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
        $products = Product::with('galeries')->find($id);
        $categories = Category::all();

        return view('cms/product/edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $product->fill($data);
        $product->categories()->sync($request->category);
        $product->update();

        $product->galeries()->delete();
        if ($request->hasFile('list_image')) {
            foreach ($request->file('list_image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('uploads/'), $imageName);
                $files = $imageName;

                $product->galeries()->create([
                    'product_id' => $product->id,
                    'thumbnail' => $files,
                ]);
            }
        }

        return redirect('products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $request->all();
        Product::find($id)->delete($data);

        return redirect('products/index')->with('flash_message', 'Product deleted successfully!');
    }
}
