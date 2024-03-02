<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Job::paginate(10);
        return view('backend.jobs.list', $data);
    }
}
