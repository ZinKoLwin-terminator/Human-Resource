<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Job::getRecord();
        return view('backend.jobs.list', $data);
    }

    public function add()
    {
        return view('backend.jobs.add');
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());
        $job = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'


        ]);

        $job = new Job;
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', 'Job successfully register.');
    }

    public function view(Request $request, $id)
    {
        // @dd($id);
        $data['getRecord'] = Job::find($id);
        return view('backend.jobs.view', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = Job::find($id);
        return view('backend.jobs.edit', $data);
    }

    public function update($id, Request $request)
    {
        // @dd($id, $request->all());
        $job = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required'


        ]);

        $job = Job::find($id);
        $job->job_title = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', 'Job successfully updated.');
    }

    public function delete($id)
    {
        $deleteRecord = Job::find($id);
        $deleteRecord->delete();
        return redirect('admin/jobs')->with('error', 'Job successfully deleted!.');
    }
}
