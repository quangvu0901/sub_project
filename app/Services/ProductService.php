<?php

namespace App\Services;

use App\Models\User\Product;

class ProductService
{
    public function updateProduct($request, $id)
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
    }
}
