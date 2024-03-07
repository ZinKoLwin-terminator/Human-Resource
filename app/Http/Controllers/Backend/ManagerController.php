<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ManagerExport;

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

        $manager->manager_name = trim($request->manager_name);
        $manager->manager_email = trim($request->manager_email);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->save();

        return redirect("admin/manager")->with("success", "Manager success fully added");
    }
    public function edit($id)
    {
        $data['getRecord'] = Manager::find($id);
        return view('backend.manager.edit', $data);
    }

    public function update($id, Request $request)
    {


        $manager = Manager::find($id);

        $manager->manager_name = trim($request->manager_name);
        $manager->manager_email = trim($request->manager_email);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->save();

        return redirect("admin/manager")->with("success", "Manager success fully updated");
    }

    public function delete($id)
    {
        $delete = Manager::find($id);
        $delete->delete();

        return redirect()->back()->with("error", "Manager successfully deleted!");
    }

    public function manager_export()
    {
        return Excel::download(new ManagerExport(), "manager.xlsx");
    }
}
