<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicecontactRequest extends FormRequest {

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
            'service_id' => 'required|not_in:0', 
            'contact' => 'required', 
            'contacttype' => 'required', 
            
		];
	}

	public function messages()
    {
        return [
            'service_id.required' => 'Choose service',
			'service_id.not_in' => 'Choose service',
			'contact.required' => 'Enter contact',
			'contacttype.not_in' => 'Enter contact type'
        ];
    }
}
