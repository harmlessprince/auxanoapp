<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateTicketComponent extends Component
{
    public $categories;
    public $statuses;
    public $priorities;
    public $users;
    public $customers;
    public $ticket_name;
    public $status;
    public $priority;
    public $category;
    public $customer;
    public $assign_to;
    public $fault_observed;
    public $fault_reported;
    public $due_date;
    public function render()
    {
        return view('livewire.create-ticket-component');
    }

    protected function rules()
    {
        return [
            'ticket_name' => ['required', 'string', 'max:200'],
            'status' => ['required', 'integer'],
            'priority' => ['required', 'string'],
            'category' => ['required', 'string'],
            'customer' => ['required', 'string', 'max:200'],
            'assign_to' => ['required', 'string', 'max:200'],
            'fault_reported' => ['required', 'string', 'max:200'],
            'fault_observed' => ['required', 'string', 'max:200'],
            'due_date' => ['required', 'date']
        ];
    }

    public function StoreTicket()
    {
        $data = $this->validate();
        dd($data);
    }
}
