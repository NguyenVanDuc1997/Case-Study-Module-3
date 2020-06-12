<?php


namespace App\Http\Repositories;


use App\Customer;
use Illuminate\Support\Facades\Response;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function store($customer)
    {
        $customer->save();
        return $customer->id;
    }

    public function getById()
    {

    }

}
