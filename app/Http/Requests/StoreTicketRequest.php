<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'ticket_name' => ['required', 'string', 'max:200'],
            'status' => ['required', 'integer', 'exists:ticket_statuses,id'],
            'priority' => ['required', 'integer', 'exists:priorities,id'],
            'category' => ['required', 'integer', 'exists:categories,id'],
            'customer' => ['required', 'integer', 'exists:customers,id'],
            'assign_to_technician' => ['nullable', 'integer', 'exists:users,id'],
            'assign_to_agent' => ['nullable', 'integer', 'exists:users,id'],
            'fault_reported' => ['required', 'string', 'max:200'],
            'fault_observed' => ['required', 'string', 'max:200'],
            'due_date' => ['required', 'date']
        ];
    }
}
