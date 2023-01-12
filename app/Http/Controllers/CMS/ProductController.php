<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\User\Category;
use App\Models\User\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    protected $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::search()->paginate(\App\Constants\Product::PRODUCT_LIST_LIMIT);

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
        DB::beginTransaction();
        try {
            $data = $request->all();
            $params = [
                'name' => $data['name'],
                'price',
                'quantity',
                'description',
            ];
            $products = new Product();
            $products->fill($params);

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

            DB::commit();
            return redirect('products/index');
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }

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
        DB::beginTransaction();
        try {
            $this->service->updateProduct($request, $id);
            DB::commit();
            return redirect('products/index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('products/index')->with('error', $e->getMessage());
        }
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
