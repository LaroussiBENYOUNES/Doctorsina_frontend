<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZoneRequest extends FormRequest {

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
            'alias' => 'required|unique:zone,alias,'.$this->zone, 
		];
	}

	public function messages()
    {
        return [
            'alias.required' => 'Enter alias for zone',
			'alias.unique' => 'Alias zone must be unique',
        ];
    }

}
