<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGrade;

class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGrade::getRecord($request);
        return view('backend.job_grades.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());
        $user = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);

        $user = new JobGrade();
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grade successfully created');
    }

    public function edit($id)
    {

        $data['getRecord'] = JobGrade::find($id);
        return view('backend.job_grades.edit', $data);
    }

    public function update($id, Request $request)
    {

        $user = request()->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);

        $user = JobGrade::find($id);
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grade successfully Updated');
    }

    public function delete($id)
    {
        $delete_record = JobGrade::find($id);
        $delete_record->delete();
        return redirect('admin/job_grades')->with('error', 'Job Grade successfully Deleted!');
    }
}
