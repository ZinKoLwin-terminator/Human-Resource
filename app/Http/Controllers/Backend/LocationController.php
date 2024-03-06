<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocationsExport;

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

    public function edit($id)
    {
        $data['getRecord'] = Location::find($id);
        $data['getCountries'] = Country::get();
        return view('backend.locations.edit', $data);
    }

    public function update($id, Request $request)
    {

        // @dd($request->all());

        $user = request()->validate([
            "street_address" => 'required',
            "postal_code" => 'required',
            "city" => 'required',
            "state_provice" => 'required',
            "countries_id" => 'required',
        ]);

        $user = Location::find($id);
        $user->street_address = $request->street_address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->state_provice = $request->state_provice;
        $user->countries_id = $request->countries_id;
        $user->save();

        return redirect("admin/locations")->with("success", "Location successfully updated");
    }

    public function delete($id)
    {
        $delete_record = Location::find($id);
        $delete_record->delete();

        return redirect()->back()->with("error", "Location successfully deleted!");
    }

    public function locations_export(Request $request)
    {
        return Excel::download(new LocationsExport(), 'locations.xlsx');
    }
}
