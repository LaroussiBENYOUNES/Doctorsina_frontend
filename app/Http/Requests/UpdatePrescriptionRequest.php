<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescriptionRequest extends FormRequest {

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
			'consultation_id' => 'required|not_in:0',
            
		];
	}

	public function messages()
    {
        return [
            'consultation_id.required' => 'Choose consultation id',
			'consultation_id.not_in' => 'Choose consultation id'

        ];
    }
}
