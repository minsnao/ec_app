<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellItemRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,jpe,png|max:2048',
            'categories' => 'required',
            'condition' => 'required',
            
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|integer|min:300|max:99999999',
            
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
