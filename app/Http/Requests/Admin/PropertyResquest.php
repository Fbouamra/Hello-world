<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyResquest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:90',
            'descreption'=>'required|min:15',
            'adress'=>'required',
            'surface'=>'required|integer',
            'rooms'=>'required|integer',
            'bedrooms'=>'required|integer',
            'floor'=>'required|integer',
            'price'=>'required',
            'sold'=>'boolean',
            'options'=>'array',
            'options.*'=>'exists:options,id'
        ];
    }
}
