<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaStoreRequset extends FormRequest
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
           'name'=>'required|string|min:3|max:40',
           'description'=>'required|min:3|max:400',
           'small_pizza_price'=>'required',
           'medium_pizza_price'=>'required',
           'large_pizza_price'=>'required',

           'category'=>'required',
           'image'=>'required|mimes:png,jpg',


        ];
    }
}
