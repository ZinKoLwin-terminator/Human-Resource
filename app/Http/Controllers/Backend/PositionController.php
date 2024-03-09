<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PositionExport;

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

    public function edit($id)
    {
        $data["getRecord"] = Position::find($id);
        return view('backend.position.edit', $data);
    }

    public function update($id, Request $request)
    {

        $position = request()->validate([
            "position_name" => "required",
            "daily_rate" => "required",
            "monthly_rate" => "required",
            "working_days_per_month" => "required"
        ]);

        $position = Position::find($id);
        $position->position_name = trim($request->position_name);
        $position->daily_rate = trim($request->daily_rate);
        $position->monthly_rate = trim($request->monthly_rate);
        $position->working_days_per_month = trim($request->working_days_per_month);
        $position->save();

        return redirect("admin/position")->with("success", "Position successfully updated");
    }

    public function delete($id)
    {
        $delete = Position::find($id);
        $delete->delete();

        return redirect()->back()->with("error", "Position success fully deleted!");
    }

    public function position_export(Request $request)
    {
        return Excel::download(new PositionExport(), "position.xlsx");
    }
}
