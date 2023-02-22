<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVaccineRequest extends FormRequest {

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
            'alias' => 'required|unique:vaccine,alias,'.$this->vaccine
		];
	}

	public function messages()
    {
        return [
			'alias.required' => 'Enter alias',
			'alias.unique' => 'Alias must be unique'
        ];
    }
}
