<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDrugmakerRequest extends FormRequest {

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
            'name' => 'required|unique:drugmaker,name,'.$this->drugmaker, 
            
		];
	}

	public function messages()
    {
        return [
            'name.required' => 'Enter name for drug maker',
			'name.unique' => 'Drug maker name exist'
        ];
    }
}
