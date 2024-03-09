<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayRoll;
use App\Models\User;

class PayrollController extends Controller
{
    public function index(Request $request)
    {

        $data['getRecord'] = PayRoll::getRecord($request);
        return view('backend.payroll.list', $data);
    }

    public function add(Request $request)
    {
        $data["getEmployees"] = User::where("is_role", "=", 0)->get();
        return view('backend.payroll.add', $data);
    }

    public function add_post(Request $request)
    {

        // @dd($request->all());

        $payroll = request()->validate([
            "employee_id" => "required",
            "number_of_day_work" => "required",
            "bonus" => "required",
            "overtime" => "required",
            "gross_salary" => "required",
            "cash_advance" => "required",
            "late_hours" => "required",
            "absent_days" => "required",
            "sss_contribution" => "required",
            "philhealth" => "required",
            "total_deductions" => "required",
            "netpay" => "required",
            "payroll_monthly" => "required",

        ]);

        $payroll = new PayRoll;
        $payroll->employee_id        = trim($request->employee_id);
        $payroll->number_of_day_work = trim($request->number_of_day_work);
        $payroll->bonus              = trim($request->bonus);
        $payroll->overtime           = trim($request->overtime);
        $payroll->gross_salary       = trim($request->gross_salary);
        $payroll->cash_advance       = trim($request->cash_advance);
        $payroll->late_hours        = trim($request->late_hours);
        $payroll->absent_days       = trim($request->absent_days);
        $payroll->sss_contribution = trim($request->sss_contribution);
        $payroll->philhealth        = trim($request->philhealth);
        $payroll->total_deductions = trim($request->total_deductions);
        $payroll->netpay            = trim($request->netpay);
        $payroll->payroll_monthly    = trim($request->payroll_monthly);

        $payroll->save();

        return redirect("admin/payroll")->with("success", "PayRoll successfully saved");
    }

    public function view($id)
    {
        $data["getRecord"] = PayRoll::find($id);
        return view('backend.payroll.view', $data);
    }
}
