<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConsultationRequest extends FormRequest {

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
			'appoitement_id' => 'required|not_in:0',
			'visitnature_id' => 'required|not_in:0',
			'visitstatus_id' => 'required|not_in:0',
			'visittype_id' => 'required|not_in:0'
		];
	}

	public function messages()
    {
        return [
			'appoitement_id.required' => 'Choose appoitement',
			'appoitement_id.not_in' => 'Choose appoitement',
			'visitnature_id.required' => 'Choose visit nature',
			'visitnature_id.not_in' => 'Choose visit nature',
			'visitstatus_id.required' => 'Choose visit status',
			'visitstatus_id.not_in' => 'Choose visit status',
			'visittype_id.required' => 'Choose visit type',
			'visittype_id.not_in' => 'Choose visit type'
        ];
    }
}
