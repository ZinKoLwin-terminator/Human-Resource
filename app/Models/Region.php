<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    static public function getRecord($request)
    {


        $return = self::select('regions.*');
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }

        if (!empty(Request::get('region_name'))) {
            $return = $return->where('region_name', 'like', '%' . Request::get('region_name') . '%');
        }

        // if (!empty(Request::get('created_at'))) {
        //     $return = $return->where('created_at', 'like', '%' . Request::get('created_at') . '%');
        // }


        // if (!empty(Request::get('updated_at'))) {
        //     $return = $return->where('updated_at', 'like', '%' . Request::get('updated_at') . '%');
        // }


        // if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
        //     $return = $return->whereBetween('start_date', [Request::get('start_date'), Request::get('end_date')]);
        // }



        $return = $return->orderBy("id", "desc")->paginate(20);
        return $return;
    }
}
