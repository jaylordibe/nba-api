<?php


namespace App\Http\Requests;

class TeamRequest extends BaseRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|unique:teams',
            'conference' => 'required',
            'division' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => 'Team name is required.',
            'conference.required' => 'Team conference is required.',
            'division.required' => 'Team division is required.'
        ];
    }
}
