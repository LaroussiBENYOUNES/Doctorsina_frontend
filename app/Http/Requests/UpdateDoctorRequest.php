<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest {

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
            //'fullname' => 'required', 
            //'user_id' => 'required|unique:doctor,user,'.$this->doctor, 
			'activated' => '',
			'signaled' => 'different:activated' 
		];
	}

	public function messages()
    {
        return [
            'signaled.different' => 'Signaled Or activated?.',
        ];
    }
}
