<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Location::getRecord($request);
        return view('backend.locations.list', $data);
    }

    public function add(Request $request)
    {
        $data['getCountries'] = Country::get();
        return view('backend.locations.add', $data);
    }

    public function add_post(Request $request)
    {
        // @dd($request->all());

        $user = request()->validate([
            "street_address" => 'required',
            "postal_code" => 'required',
            "city" => 'required',
            "state_provice" => 'required',
            "countries_id" => 'required',
        ]);

        $user = new Location;
        $user->street_address = $request->street_address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->state_provice = $request->state_provice;
        $user->countries_id = $request->countries_id;
        $user->save();

        return redirect("admin/locations")->with("success", "Location successfully added");
    }
}
