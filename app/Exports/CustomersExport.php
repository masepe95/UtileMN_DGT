<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    protected $customerIds = [];

    public function forCustomers($ids)
    {
        $this->customerIds = $ids;
        return $this;
    }

    public function collection()
    {
        if (!empty($this->customerIds)) {
            return Customer::whereIn('id', $this->customerIds)->get();
        }

        return Customer::all();
    }
}
