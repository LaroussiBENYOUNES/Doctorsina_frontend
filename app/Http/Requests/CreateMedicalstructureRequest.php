<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicalStructureRequest extends FormRequest {

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
            'label' => 'required|unique:medicalstructure,label,'.$this->medicalstructure, 
			'country_id' => 'required|not_in:0', 
			'structuretype_id' => 'required|not_in:0', 
			'activated' => 'not_in:-3',
			'signaled' => 'different:activated'
		];
	}

	public function messages()
    {
        return [
            'label.required' => 'Enter label for medical structure',
			'label.unique' => 'Label medical structure must be unique',
			'country_id.required' => 'Choose country',
			'country_id.not_in' => 'Choose country',
			'structuretype_id.required' => 'Choose strucuture type',
			'structuretype_id.not_in' => 'Choose strucuture type',
			'signaled.different' => 'signaled must be diffrent than activated'
        ];
    }

}
