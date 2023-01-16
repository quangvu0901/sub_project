<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function createProduct($request)
    {
        $data = $request->all();
        $params = [
            'name' => $data['name'],
            'price'=> $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
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
    }

    public function updateProduct($request, $id)
    {
        $data = $request->all();
        $params = [
            'name' => $data['name'],
            'price'=> $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
        ];
        $product = Product::find($id);
        $product->fill($params);
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
    }
}

