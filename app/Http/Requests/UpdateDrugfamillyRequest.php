<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDrugfamillyRequest extends FormRequest {

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
            'name' => 'required|unique:drugfamilly,name,'.$this->drugfamilly, 
            
		];
	}

	public function messages()
    {
        return [
            'name.required' => 'Enter name for drug familly',
			'name.unique' => 'Drug familly name exist'
        ];
    }
}
