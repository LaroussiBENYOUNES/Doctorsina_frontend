<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralexamRequest extends FormRequest {

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
            'weight' => 'numeric', 
            'size' => 'numeric', 
            'fever' => 'numeric', 
            'consultation_id' => 'required|not_in:0', 
		];
	}

	public function messages()
    {
        return [
            'weight.numeric' => 'Weight is a numeric value',
			'size.numeric' => 'Size is a numeric value',
            'fever.numeric' => 'Fever is a numeric value',
			'consultation_id.required' => 'Choose consultation',
			'consultation_id.not_in' => 'Choose consultation'
        ];
    }
}
