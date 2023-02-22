<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisittypeRequest extends FormRequest {

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
            'alias' => 'required|unique:visittype,alias,'.$this->visittype, 
		];
	}

	public function messages()
    {
        return [
            'alias.required' => 'Enter alias for visit type',
			'alias.unique' => 'Alias visit type must be unique',
        ];
    }
}
