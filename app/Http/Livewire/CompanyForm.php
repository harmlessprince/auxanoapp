<?php

namespace App\Http\Livewire;

use App\Enums\CustomerType;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\Eloquent\Repository\CustomerRepository;
use Livewire\Component;

class CompanyForm extends Component
{

    public $types;
    public $type;
    public $name;
    public $email;
    public $phone_number;
    public $address;
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:6', 'max:200'],
            'email' => ['required', 'email', 'unique:customers,email', 'max:200'],
            'phone_number' => ['required', 'string'],
            'type' => ['required', 'string'],
            'address' => ['required', 'string', 'max:200']
        ];
    }
    public function mount()
    {
        $this->types = CustomerType::toCollection();
       
    }

    public function render()
    {
        return view('livewire.company-form');
    }

    public function createCustomer(CustomerRepository $customerRepository)
    {
        $validatedData = $this->validate();
        $customerRepository->create($validatedData);
        return redirect(route('customers.index'))->with('success', "Customer added successfully");
    }

    public function editCustomer(Customer $customer)
    {
        dd($customer);
    }
}
