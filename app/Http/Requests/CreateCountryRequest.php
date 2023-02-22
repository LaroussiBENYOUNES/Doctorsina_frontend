<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest {

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
            'alias' => 'required|unique:country,alias,'.$this->country, 
            'zone_id' => 'required|not_in:0', 
            
		];
	}

	public function messages()
    {
        return [
            'alias.required' => 'Enter alias for zone',
			'alias.unique' => 'Alias zone must be unique',
			'zone_id.required' => 'Choose zone',
			'zone_id.not_in' => 'Choose zone'
        ];
    }

}
