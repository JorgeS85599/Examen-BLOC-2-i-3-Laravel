<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GangaRequest extends FormRequest
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
            'title'=>'required',
            'price'=>'required|numeric|between:0.00,999999.99',
            'dprice'=>'required|numeric|lt:price',
            'category'=>'required|integer',
            'description'=>'required',
            'points'=>'required|numeric',
            'url'=>'required',
        ];
    }
}
