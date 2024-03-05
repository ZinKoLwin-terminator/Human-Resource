<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Region::getRecord($request);
        return view('backend.regions.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.regions.add');
    }

    public function add_post(Request $request)
    {
        $region = request()->validate([
            'region_name' => 'required'
        ]);
        $region = new Region;
        $region->region_name = trim($request->region_name);
        $region->save();

        return redirect('admin/regions')->with('success', "Region successfully created");
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Region::find($id);
        return view('backend.regions.edit', $data);
    }

    public function update($id, Request $request)
    {
        $region = request()->validate([
            'region_name' => 'required'
        ]);
        $region = Region::find($id);
        $region->region_name = trim($request->region_name);
        $region->save();

        return redirect('admin/regions')->with('success', "Region successfully updated");
    }

    public function delete($id)
    {
        $delete_region = Region::find($id);
        $delete_region->delete();
        return redirect('admin/regions')->with('error', "Region successfully deleted!");
    }
}
