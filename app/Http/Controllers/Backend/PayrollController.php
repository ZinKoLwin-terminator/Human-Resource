<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayRoll;
use App\Models\User;

class PayrollController extends Controller
{
    public function index(Request $request)
    {

        // $data['getRecord'] = PayRoll->getRecord($request);
        return view('backend.payroll.list');
    }

    public function add(Request $request)
    {
        $data["getEmployees"] = User::where("is_role", "=", 0)->get();
        return view('backend.payroll.add', $data);
    }
}
