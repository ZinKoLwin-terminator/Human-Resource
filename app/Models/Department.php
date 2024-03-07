<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use Illuminate\Support\Facades\Request;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';

    static public function getRecord($request)
    {

        //

        $return = self::select("departments.*", 'locations.street_address')->join('locations', 'locations.id', '=', 'departments.locations_id')->orderBy('id', 'desc');
        //search box start



        if (!empty(Request::get('id'))) {
            $return = $return->where('departments.id', "=", Request::get("id"));
        }

        if (!empty(Request::get('department_name'))) {
            $return = $return->where("departments.department_name", "like", "%" . Request::get("department_name") . "%");
        }

        if (!empty(Request::get('street_address'))) {
            $return = $return->where('locations.street_address', "like", "%" . Request::get("street_address") . "%");
        }

        // if (!empty(Request::get('max_salary'))) {
        //     $return = $return->where('max_salary', "like", "%" . Request::get("max_salary") . "%");
        // }

        // if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
        //     $return = $return->where('jobs.created_at', '>=', Request::get('start_date'))->where('jobs.created_at', '<=', Request::get('end_date'));
        // }
        //search box end
        $return = $return->paginate(20);
        return $return;
    }

    public function location()
    {
        return $this->belongsTo(Location::class, "locations_id");
    }
}
