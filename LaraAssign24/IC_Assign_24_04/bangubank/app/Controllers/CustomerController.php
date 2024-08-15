<?php
namespace App\Controllers;

use Src\View\View;
use App\Models\User;
use Config\Database;
use Src\Support\AppHelper;

class CustomerController //extends BaseController
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function index()
    {
        return AppHelper::view('customer.index');
    }

    public function deposit()
    {
        return AppHelper::view('customer.deposit');
    }

    public function withdraw()
    {
        return AppHelper::view('customer.withdraw');
    }

    public function transfer()
    {
        return AppHelper::view('customer.transfer');
    }
}
