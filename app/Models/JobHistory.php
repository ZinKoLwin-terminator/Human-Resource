<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;
    protected $table = 'job_history';

    static public function getRecord($request)
    {
        $return = self::select('job_history.*')
            ->orderBy('id', 'desc')
            ->paginate(20);

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
