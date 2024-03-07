<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function index(Request $request)
    {

        $data["getRecord"] = Manager::getRecord($request);
        return view('backend.manager.list', $data);
    }

    public function add(Request $request)
    {

        return view('backend.manager.add');
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());

        $manager = request()->validate([
            "manager_name" => "required|unique:manager",
            "manager_email" => "required",
            "manager_mobile" => "required",
        ]);

        $manager = new Manager;

        $manager->manager_name = $request->manager_name;
        $manager->manager_email = $request->manager_email;
        $manager->manager_mobile = $request->manager_mobile;
        $manager->save();

        return redirect("admin/manager")->with("success", "Manager success fully added");
    }
}
