<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Manager;
use App\Models\Department;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }

    public function add()
    {
        $data["getDepartments"] = Department::get();
        $data["getManagers"] = Manager::get();
        $data["getJobs"] = Job::get();
        return view('backend.employees.add', $data);
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',

        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id  = trim($request->department_id);
        $user->is_role = 0; //0=employee

        if (!empty($request->file('profile_image'))) {
            $file = $request->file("profile_image");
            $randomStr = Str::random(30);
            $filename = $randomStr . "." . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename;
        }
        $user->save();

        return redirect('admin/employees')->with('success', 'Employees successfully register.');
    }

    public function view(Request $request, $id)
    {
        $data["getRecord"] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id, Request $request)
    {
        $data["getRecord"] = User::find($id);
        $data["getJobs"] = Job::get();
        $data["getDepartments"] = Department::get();
        $data["getManagers"] = Manager::get();
        return view('backend.employees.edit', $data);
    }

    public function update($id, Request $request)
    {
        // @dd($id, $request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',

        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id  = trim($request->department_id);
        $user->is_role = 0; //0=employee

        if (!empty($request->file('profile_image'))) {

            if (!empty($user->profile_image) && file_exists('upload/' . $user->profile_image)) {
                unlink('upload/' . $user->profile_image);
            }

            $file = $request->file("profile_image");
            $randomStr = Str::random(30);
            $filename = $randomStr . "." . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename;
        }
        $user->save();

        return redirect('admin/employees')->with('success', 'Employees successfully updated.');
    }

    public function delete($id)
    {
        $deleteRecord = User::find($id);
        $deleteRecord->delete();

        return redirect()->back()->with('error', 'Record successfully deleted');
    }
}
