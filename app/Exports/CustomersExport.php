<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    protected $customerIds = [];
    protected $columns = [];

    public function forCustomers($ids)
    {
        $this->customerIds = $ids;
        return $this;
    }

    public function withColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function collection()
    {
        $query = Customer::query();

        if (!empty($this->customerIds)) {
            $query->whereIn('id', $this->customerIds);
        }

        if (!empty($this->columns)) {
            $query->select($this->columns);
        }

        return $query->get();
    }

    public function headings(): array
    {
        // Se $this->columns è vuoto, potresti voler ritornare tutte le intestazioni.
        // Altrimenti, ritorna le intestazioni corrispondenti alle colonne selezionate.
        return $this->columns;
    }
}
