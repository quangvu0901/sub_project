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
            'discount' => $data['discount'],
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

                $products->images()->create([
                    'product_id' => $products->id,
                    'image' => $files,
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
            'discount' => $data['discount'],
            'description' => $data['description'],
        ];
        $product = Product::find($id);
        $product->fill($params);
        $product->categories()->sync($request->category);
        $product->update();

//        $product->images()->delete();
        if ($request->hasFile('list_image')) {
            foreach ($request->file('list_image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('uploads/'), $imageName);
                $files = $imageName;

                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $files,
                ]);
            }
        }
    }
}

