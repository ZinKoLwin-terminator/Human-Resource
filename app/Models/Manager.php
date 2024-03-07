<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Manager extends Model
{
    use HasFactory;
    protected $table = "manager";

    static public function getRecord($request)
    {
        $return = self::select("manager.*");
        //search box start



        if (!empty(Request::get('id'))) {
            $return = $return->where('id', "=", Request::get("id"));
        }

        if (!empty(Request::get('manager_name'))) {
            $return = $return->where("manager_name", "like", "%" . Request::get("manager_name") . "%");
        }

        if (!empty(Request::get('manager_email'))) {
            $return = $return->where('manager_email', "like", "%" . Request::get("manager_email") . "%");
        }

        if (!empty(Request::get('manager_mobile'))) {
            $return = $return->where('manager_mobile', "like", "%" . Request::get("manager_mobile") . "%");
        }

        // if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
        //     $return = $return->where('jobs.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        // }
        //search box end
        $return = $return->orderBy("id", "desc")->paginate(20);
        return $return;
    }
}