<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\JobHistory;
use App\Models\JobGrade;
use App\Models\Region;
use App\Models\Country;
use App\Models\Location;
use App\Models\Department;
use App\Models\Manager;
use App\Models\PayRoll;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::user()->is_role == '1') {
            $data["getEmployeeCount"] = User::count();
            $data["getHRCount"] = User::where("is_role", "=", "1")->count();
            $data["getEMPCount"] = User::where("is_role", "=", "0")->count();
            $data["getTotalJobsCount"] = Job::count();
            $data["getTotalJobHistoryCount"] = JobHistory::count();
            $data["getTotalJobGradeCount"] = JobGrade::count();
            $data["getTotalRegionCount"] = Region::count();
            $data["TodayRegion"] = Region::whereDate("created_at", \Carbon\Carbon::today())->count();

            $data["YesterdayRegion"] = Region::whereDate("created_at", \Carbon\Carbon::yesterday())->count();
            $data["getCountriesCount"] = Country::count();
            $data["getLocationsCount"] = Location::count();
            $data["getDepartmentsCount"] = Department::count();
            $data["getManagersCount"] = Manager::count();
            $data["getPayRollsCount"] = PayRoll::count();
            $data["getPositionsCount"] = PayRoll::count();
            return view('backend.dashboard.list', $data);
        } else if (Auth::user()->is_role == '0') {

            return view('backend.employee.dashboard.list');
        }
    }
}
