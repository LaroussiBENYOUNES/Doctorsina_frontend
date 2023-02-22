<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialityRequest extends FormRequest {

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
            'name' => 'required|unique:speciality,name,'.$this->speciality 
		];
	}

	public function messages()
    {
        return [
            'name.required' => 'Enter name for speciality',
			'name.unique' => 'Speciality name exist'
        ];
    }
}
