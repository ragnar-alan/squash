<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
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
            'gym' => 'required',
            'rdate' => 'required',
            'participants' => 'required|array|min:1'
        ];
    }

    public function messages()
    {
        return [
            'gym.required' => 'The gym is required',
            'rdate.required'  => 'The reservation date is required',
            'participants.required'  => 'You must set participants'
        ];
    }
}
