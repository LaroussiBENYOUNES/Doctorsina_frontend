<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest {

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
            'monday' => 'required', 
            'tuesday' => 'required', 
            'wednesday' => 'required', 
            'thursday' => 'required', 
            'friday' => 'required', 
            'saturday' => 'required', 
            'sunday' => 'required', 
            'label' => 'required', 
            
		];
	}

	public function messages()
    {
        return [
            'monday.required' => 'Choose monday schedule',
			'tuesday.required' => 'Choose tuesday schedule',
			'wednesday.required' => 'Choose wednesday schedule',
            'thursday.required' => 'Choose thursday schedule',
            'friday.required' => 'Choose friday schedule',
            'saturday.required' => 'Choose saturday schedule',
            'sunday.required' => 'Choose sunday schedule',
			'label.required' => 'Enter Label'
        ];
    }
}
