<?php
namespace App\Controllers;

use Src\View\View;
use Src\Support\AppHelper;

class AdminController
{
    public function add_customer()
    {
        return AppHelper::view('admin.add_customer');
    }

    public function customers_transaction()
    {
        return AppHelper::view('admin.customers_transaction');
    }

    public function customers()
    {
        return AppHelper::view('admin.customers');
    }

    public function transactions()
    {
        return AppHelper::view('admin.transactions');
    }
}
