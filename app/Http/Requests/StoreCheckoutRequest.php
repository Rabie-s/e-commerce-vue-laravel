<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
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
            'shippingAddress.first_name' => 'required|max:60',
            'shippingAddress.last_name' => 'required|max:60',
            'shippingAddress.country' => 'required',
            'shippingAddress.area' => 'required',
            'shippingAddress.street_address' => 'required',
            'shippingAddress.phone_number' => 'required|numeric|digits_between:1,16',
            'orderPayment.payment_method' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'shippingAddress.first_name.required' => 'The first name is required.',
            'shippingAddress.first_name.max' => 'The first name must not exceed 60 characters.',
            'shippingAddress.last_name.required' => 'The last name is required.',
            'shippingAddress.last_name.max' => 'The last name must not exceed 60 characters.',
            'shippingAddress.country.required' => 'The country is required.',
            'shippingAddress.area.required' => 'The area is required.',
            'shippingAddress.street_address.required' => 'The street address is required.',
            'shippingAddress.phone_number.required' => 'The phone number is required.',
            'shippingAddress.phone_number.numeric' => 'The phone number must be numeric.',
            'shippingAddress.phone_number.digits_between' => 'The phone number must be between 1 and 20 digits.',
            'orderPayment.payment_method.required' => 'The payment method is required.',
        ];
    }
}
