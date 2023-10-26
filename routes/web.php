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

Route::get('export-customers/{ids?}', function ($ids = null) {
    $export = new CustomersExport();

    if ($ids) {
        $idsArray = explode(',', $ids);
        $export->forCustomers($idsArray);
    }

    return Excel::download($export, $ids ? 'customers_selected.xlsx' : 'customers.xlsx');
})->name('export.customers');
