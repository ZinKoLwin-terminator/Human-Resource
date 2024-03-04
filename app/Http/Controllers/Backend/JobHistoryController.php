<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {

        return view('backend.job_history.list');
    }

    public function add(Request $request)
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = Job::get();
        return view('backend.job_history.add', $data);
    }
}
