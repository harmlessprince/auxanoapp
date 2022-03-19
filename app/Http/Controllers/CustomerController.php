<?php

namespace App\Http\Controllers;

use App\Enums\CustomerType;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Repositories\Eloquent\Repository\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private  $customerRepository;
    private $customerTypes;

    public function __construct(CustomerRepository $customerRepository)
    {
       $this->customerRepository = $customerRepository;
       $this->customerTypes = CustomerType::toCollection();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $customers = $this->customerRepository->paginate(5);
        $types = $this->customerTypes;
        return view('customers.index', compact('customers', 'types'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $Customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customerTypes = $this->customerTypes;
        return view('customers.edit', compact('customer', 'customerTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->customerRepository->update($customer->id, $request->validated());
        return redirect(route('customers.index'))->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        dd($customer);
    }
}
