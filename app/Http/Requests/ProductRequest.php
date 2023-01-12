<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'description' => 'required|min:20',
            'list_image.*' => 'required|mimes:jpeg,jpg,png|max:5120',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Not empty',
            'name.max' => 'Not than 255 characters',
            'price.required' => 'Not empty',
            'price.numeric' => 'Price just number',
            'price.min' => 'Price than 0',
            'quantity.required' => 'Not empty',
            'quantity.numeric' => 'Quantity just number',
            'quantity.min' => 'Quantity than 0',
            'description.required' => 'Not empty',
            'description.max' => 'Not less 20 characters',
            'list_image.*.required' => 'Not empty',
            'list_image.*.mimes' => 'Image just .jpeg,jpg,png',
            'list_image.*.max' => 'Image less 5MB',
            'category.required' => 'Not empty',
        ];
    }
}
