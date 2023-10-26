<?php

use Illuminate\Support\Facades\Route;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('export-customers/{id?}', function ($id = null) {
    $export = new CustomersExport();

    if ($id) {
        $export->forCustomer($id);
    }

    return Excel::download($export, $id ? 'customer_' . $id . '.xlsx' : 'customers.xlsx');
})->name('export.customers');
