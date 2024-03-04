<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class JobHistory extends Model
{
    use HasFactory;
    protected $table = 'job_history';

    static public function getRecord($request)
    {
        // $return = self::select('job_history.*')

        $return = self::select('job_history.*', 'users.name', 'jobs.job_title')->join('users', 'users.id', '=', 'job_history.employee_id')->join('jobs', 'jobs.id', '=', 'job_history.job_id')->orderBy('job_history.id', 'desc');

        if (!empty(Request::get('id'))) {
            $return = $return->where('job_history.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }


        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('job_history.created_at', '>=', Request::get('start_date'))->where('job_history.created_at', '<=', Request::get('end_date'));
        }

        if (!empty(Request::get('job_title'))) {
            $return = $return->where('jobs.job_title', 'like', '%' . Request::get('job_title') . '%');
        }


        $return = $return->paginate(20);

        return $return;
    }

    public function Employee()
    {
        return  $this->belongsTo(User::class, 'employee_id');
    }

    public function Job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
