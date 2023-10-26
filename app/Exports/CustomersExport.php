<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    protected $customerId = null;

    public function forCustomer($id)
    {
        $this->customerId = $id;
        return $this;
    }

    public function collection()
    {
        if ($this->customerId) {
            return collect([Customer::find($this->customerId)]);
        }

        return Customer::all();
    }
}
