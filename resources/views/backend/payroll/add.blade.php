


@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Pay Roll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add Pay Roll
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/payroll/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="employee_id" id="" required>
                                    <option value="">Select Employee Name</option>
                                    @foreach ($getEmployees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Number Of Day Work<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="number_of_day_work" class="form-control" value="{{old("number_of_day_work")}}" placeholder="Enter Number Of Day Work" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Bouns<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="bonus" class="form-control" value="{{old("bonus")}}" placeholder="Enter Bouns" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Overtime<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="overtime" class="form-control" value="{{old("overtime")}}" placeholder="Enter Overtime" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Gross Salary<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="gross_salary" class="form-control" value="{{old("gross_salary")}}" placeholder="Enter Gross Salary" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Cash Advance<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="cash_advance" class="form-control" value="{{old("cash_advance")}}" placeholder="Enter Cash Advance" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Late Hours<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="late_hours" class="form-control" value="{{old("late_hours")}}" placeholder="Enter Late Hours" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Absent Days<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="absent_days" class="form-control" value="{{old("absent_days")}}" placeholder="Enter Absent Days" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">SSS Contribution<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="sss_contribution" class="form-control" value="{{old("sss_contribution")}}" placeholder="Enter SSS Contribution" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Philhealth<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="philhealth" class="form-control" value="{{old("philhealth")}}" placeholder="Enter Philhealth" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total DEductions<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="total_deductions" class="form-control" value="{{old("total_deductions")}}" placeholder="Enter Total DEductions" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">NetPay<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="netpay" class="form-control" value="{{old("netpay")}}" placeholder="Enter NetPay" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">PayRoll Monthly<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="payroll_monthly" class="form-control" value="{{old("payroll_monthly")}}" placeholder="Enter PayRoll Monthly" required>
                            </div>
                        </div>
                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/payroll")}}" class="btn btn-default ">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>



                       </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

  </div>
   @endsection
