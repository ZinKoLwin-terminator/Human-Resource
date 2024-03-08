<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayRoll;

class PayrollController extends Controller
{
    public function index(Request $request)
    {

        // $data['getRecord'] = PayRoll->getRecord($request);
        return view('backend.payroll.list');
    }

    public function add(Request $request)
    {

        return view('backend.payroll.add');
    }
}
