<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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

            'name' => ['required', 'string', 'min:6', 'max:200'],
            'email' => ['required', 'email', 'max:200', 'unique:customers,email,' . $this->customer->id],
            'phone_number' => ['required', 'string'],
            'type' => ['required', 'string'],
            'address' => ['required', 'string', 'max:200']
        ];
    }
}
