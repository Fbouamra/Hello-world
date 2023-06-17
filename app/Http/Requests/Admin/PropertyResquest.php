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
            'title' => 'required',
            'adress' => 'required',
            'descreption' => 'required',
            'surface' => 'required|numeric',
            'rooms' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'floor' => 'required|numeric',
            'options' => 'required|array',
            'photo' => 'required|image',
            'sold' => 'boolean',
            'price' => 'required|numeric'
        ];


}}

