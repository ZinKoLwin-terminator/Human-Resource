<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

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
}
