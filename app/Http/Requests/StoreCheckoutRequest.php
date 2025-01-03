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
            'shippingAddress.phone_number' => 'required|max:20',

            'orderPayment.payment_method'=>'required'
        ];
    }

}
