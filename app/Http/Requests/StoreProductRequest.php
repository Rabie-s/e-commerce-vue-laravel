<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'main_image' => 'required|file|mimes:png,jpg,jpeg|max:2048', // Limit file size to 2MB
            'quantity' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|numeric|exists:categories,id', // Ensure category_id exists in the categories table
            'images.*' => 'nullable|file|mimes:png,jpg,jpeg|max:2048', // Validate multiple additional images
        ];
    }
}
