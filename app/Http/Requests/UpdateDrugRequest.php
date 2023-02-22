<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDrugRequest extends FormRequest {

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
            'drugfamilly_id' => 'required|not_in:0', 
			'drugmaker_id' => 'required|not_in:0', 
            'alias' => 'required|unique:drug,alias,'.$this->drug,  
		];
	}

	public function messages()
    {
        return [
            'drugfamilly_id.required' => 'Choose drug familly',
			'drugfamilly_id.not_in' => 'Choose drug familly',
			'drugmaker_id.required' => 'Choose drug maker',
			'drugmaker_id.not_in' => 'Choose drug maker',
			'alias.required' => 'Enter alias for drug',
			'alias.unique' => 'Alias drug exist'
        ];
    }
}
