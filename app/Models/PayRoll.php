<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class PayRoll extends Model
{
    use HasFactory;
    protected $table = "payroll";

    static public function getRecord($request)
    {
        // $return = self::select("payroll.*", "users.name", "users.last_name")
        //     ->join("users", "users.id", "=", "payroll.employee_id")
        //     ->orderBy("payroll.id", "desc")
        //     ->paginate(10);

        // return $return;



        $return = self::select('payroll.*', 'users.name', 'users.last_name')->join('users', 'users.id', '=', 'payroll.employee_id')->orderBy('payroll.id', 'desc');

        if (!empty(Request::get('id'))) {
            $return = $return->where('payroll.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('number_of_day_work'))) {
            $return = $return->where('payroll.number_of_day_work', 'like', '%' . Request::get('number_of_day_work') . '%');
        }

        if (!empty(Request::get('bonus'))) {
            $return = $return->where('payroll.bonus', 'like', '%' . Request::get('bonus') . '%');
        }

        if (!empty(Request::get('overtime'))) {
            $return = $return->where('payroll.overtime', 'like', '%' . Request::get('overtime') . '%');
        }

        // if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
        //     $return = $return->where('job_history.start_date', '>=', Request::get('start_date'))->where('job_history.end_date', '<=', Request::get('end_date'));
        // }

        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->whereBetween('job_history.start_date', [Request::get('start_date'), Request::get('end_date')]);
        }



        $return = $return->paginate(20);

        return $return;
    }

    public function get_employee_name_single()
    {
        return $this->belongsTo(User::class, "employee_id");
    }
}
