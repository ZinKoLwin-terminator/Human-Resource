<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountriesExport;

class CountriesController extends Controller
{
    public function index(Request $request)
    {

        $data['getRecord'] = Country::getRecord($request);
        return view('backend.countries.list', $data);
    }

    public function add(Request $request)
    {
        $data['getRegions'] = Region::get();
        return view('backend.countries.add', $data);
    }

    public function add_post(Request $request)
    {

        $country = request()->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);
        $country = new Country;
        $country->country_name = $request->country_name;
        $country->regions_id = $request->regions_id;
        $country->save();

        return redirect('admin/countries')->with('success', 'Countries successfully created');
    }


    public function edit($id, Request $request)
    {
        $data['getRecord'] = Country::find($id);
        $data['getRegions'] = Region::get();
        return view('backend.countries.edit', $data);
    }
    public function update($id, Request $request)
    {
        $country = request()->validate([
            'country_name' => 'required',
            'regions_id' => 'required'
        ]);
        $country = Country::find($id);
        $country->country_name = $request->country_name;
        $country->regions_id = $request->regions_id;
        $country->save();

        return redirect('admin/countries')->with('success', 'Countries successfully updated');
    }

    public function delete($id)
    {
        $delete_country = Country::find($id);
        $delete_country->delete();

        return redirect()->back()->with("error", "Countries Successfully Deleted!");
    }

    public function countries_export()
    {
        return Excel::download(new CountriesExport(), 'countries.xlsx');
    }
}
