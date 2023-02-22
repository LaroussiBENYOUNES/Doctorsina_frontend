<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest {

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
			'site_id' => 'required|not_in:0', 
			'schedule_id' => 'required|not_in:0', 
            'label' => 'required'         
		];
	}

	public function messages()
    {
        return [
            'site_id.required' => 'Choose site',
			'site_id.not_in' => 'Choose site',
			'schedule_id.required' => 'Choose schedule',
			'schedule_id.not_in' => 'Choose schedule',
			'label.required' => 'Enter Label for service'
        ];
    }
}
