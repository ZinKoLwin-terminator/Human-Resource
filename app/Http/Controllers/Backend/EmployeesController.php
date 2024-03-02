<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {

        return view('backend.employees.list');
    }

    public function add(Request $request)
    {

        return view('backend.employees.add');
    }

    public function add_post(Request $request)
    {
        @dd($request->all());
    }
}
