<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Location;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Department::getRecord($request);
        return view('backend.departments.list', $data);
    }

    public function add(Request $request)
    {
        $data['getLocations'] = Location::get();
        return view('backend.departments.add', $data);
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());

        $user = request()->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'locations_id' => 'required',
        ]);

        $user = new Department;
        $user->department_name = $request->department_name;
        $user->manager_id = $request->manager_id;
        $user->locations_id = $request->locations_id;
        $user->save();

        return redirect("admin/departments")->with("success", "Department successfully created");
    }
}
