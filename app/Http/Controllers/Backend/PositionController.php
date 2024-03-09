<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $data["getRecord"] = Position::getRecord($request);
        return view('backend.position.list', $data);
    }

    public function add(Request $request)
    {

        return view("backend.position.add");
    }

    public function add_post(Request $request)
    {
        $position = request()->validate([
            "position_name" => "required",
            "daily_rate" => "required",
            "monthly_rate" => "required",
            "working_days_per_month" => "required"
        ]);

        $position = new Position;
        $position->position_name = trim($request->position_name);
        $position->daily_rate = trim($request->daily_rate);
        $position->monthly_rate = trim($request->monthly_rate);
        $position->working_days_per_month = trim($request->working_days_per_month);
        $position->save();

        return redirect("admin/position")->with("success", "Position successfully added");
    }
}
