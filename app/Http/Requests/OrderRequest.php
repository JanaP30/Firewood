<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'quantity'=>'required',
            'type_of_wood_id'=>'required',
            'category_id'=>'required',
            'note'=>'required'
        ];
    }
    
}
