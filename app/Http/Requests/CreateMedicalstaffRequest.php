<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicalstaffRequest extends FormRequest {

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
            'user_id' => 'required|not_in:0', 
            'medicalstructure_id' => 'required|not_in:0' 
		];
	}

	public function messages()
    {
        return [
            'user_id.required' => 'Choose employee',
			'user_id.not_in' => 'Choose employee',
			'medicalstructure_id.required' => 'Choose medical structure',
			'medicalstructure_id.not_in' => 'Choose medical structure'
        ];
    }
}
