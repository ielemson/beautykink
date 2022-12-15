<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingServiceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'method' => 'nullable',
            'state_id' => 'required',
            'country_id' => 'required',
            'price' => 'numeric|max:9999999999',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'price.required' => __('Shipping Rate is required'),
            'country_id.required' => __('Shipping Country is required'),
            'state_id.required' => __('Shipping State is required'),
            'state_id.unique' => __('Duplicate State is not allowed')
        ];
    }
}
