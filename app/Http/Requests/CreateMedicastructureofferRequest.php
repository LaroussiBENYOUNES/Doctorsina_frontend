<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicastructureofferRequest extends FormRequest {

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
			'offertype_id' => 'required|not_in:0', 
            'begginningdate' => 'required', 
            'enddate' => 'required', 
            
		];
	}

	public function messages()
    {
        return [
            'medicalstructure_id.required' => 'Choose medical structure',
			'medicalstructure_id.not_in' => 'Choose medical structure',
			'offertype_id.required' => 'Choose offer',
			'offertype_id.not_in' => 'Choose offer',
			'begginningdate.required' => 'Choose begginning date',
			'enddate.required' => 'Choose end date'
        ];
    }
}
