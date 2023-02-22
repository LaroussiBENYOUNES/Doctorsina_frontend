<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSiteRequest extends FormRequest {

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
            'medicalstructure_id' => 'required|not_in:0', 
			'country_id' => 'required|not_in:0', 
            'label' => 'required', 
		];
	}

	public function messages()
    {
        return [
            'medicalstructure_id.required' => 'Choose medical structure',
			'medicalstructure_id.not_in' => 'Choose medical structure',
			'country_id.required' => 'Choose country',
			'country_id.not_in' => 'Choose country',
			'label.required' => 'Enter Label for site'
        ];
    }
}
