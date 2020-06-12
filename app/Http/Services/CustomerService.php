<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function store($request)
    {
        $customer = new Customer();
        $customer->last_name = $request->input('last_name');
        $customer->first_name = $request->input('first_name');
        $customer->phone = $request->input('phone');
        $customer->personal_id = $request->input('personal_id');
        $customer->email = $request->input('email');
        return $this->customerRepository->store($customer);
    }

}
