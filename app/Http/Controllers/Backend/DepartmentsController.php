<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Location;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DepartmentsExport;
use App\Models\Manager;

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
        $data["getManagers"] = Manager::get();
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
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();

        return redirect("admin/departments")->with("success", "Department successfully created");
    }

    public function edit($id)
    {
        $data['getLocations'] = Location::get();
        $data["getManagers"] = Manager::get();
        $data['getRecord'] = Department::find($id);
        return view('backend.departments.edit', $data);
    }

    public function update($id, Request $request)
    {
        $user = request()->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'locations_id' => 'required',
        ]);

        $user = Department::find($id);
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();

        return redirect("admin/departments")->with("success", "Department successfully updated");
    }

    public function delete($id)
    {
        $delete = Department::find($id);
        $delete->delete();

        return redirect()->back()->with("error", "Department successfully deleted!");
    }

    public function departments_export()
    {
        return Excel::download(new DepartmentsExport(), 'departments.xlsx');
    }
}
