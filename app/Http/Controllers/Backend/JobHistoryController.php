<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobHistory::getRecord($request);
        return view('backend.job_history.list', $data);
    }

    public function add(Request $request)
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = Job::get();
        return view('backend.job_history.add', $data);
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());
        $user = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $user = new JobHistory();
        $user->employee_id = trim($request->employee_id);

        $user->start_date = trim($request->start_date);

        $user->end_date = trim($request->end_date);
        $user->job_id  = trim($request->job_id);
        $user->department_id = trim($request->department_id);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Job History successfully created');
    }

    public function edit($id, Request $request)
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = Job::get();
        $data['getRecord'] = JobHistory::find($id);
        return view('backend.job_history.edit', $data);
    }

    public function update($id, Request $request)
    {
        $user = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $user = JobHistory::find($id);
        $user->employee_id = trim($request->employee_id);

        $user->start_date = trim($request->start_date);

        $user->end_date = trim($request->end_date);
        $user->job_id  = trim($request->job_id);
        $user->department_id = trim($request->department_id);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Job History successfully updated!');
    }

    public function delete($id)
    {
        $delete_record = JobHistory::find($id);
        $delete_record->delete();

        return redirect('admin/job_history')->with('error', 'Job History successfully deleted!');
    }
}
