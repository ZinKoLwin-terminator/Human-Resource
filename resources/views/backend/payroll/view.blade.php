@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View PayRoll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">PayRoll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                View PayRoll
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ID<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->id}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Employee Name<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{!empty($getRecord->get_employee_name_single->name)?$getRecord->get_employee_name_single->name:""}} {{!empty($getRecord->get_employee_name_single->last_name)?$getRecord->get_employee_name_single->last_name:""}}


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Bonus<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->bonus}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Overtime<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->overtime}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gross Salary<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->gross_salary}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Cash Advance<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->cash_advance}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Late Hours<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->late_hours}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Absent Days<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->absent_days}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">SSS Contribution<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->sss_contribution}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Philhealth<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->philhealth}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Total Deductions<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->total_deductions}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">NetPay<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->netpay}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">PayRoll Monthly<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->payroll_monthly}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Created At<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{date('d-m-Y H:i A',strtotime($getRecord->created_at))}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Updated At<span style="color:red">*</span></label>
                                <div class="col-sm-10 mt-1">
                                    {{date('d-m-Y H:i A',strtotime($getRecord->updated_at))}}
                                </div>
                            </div>


                            </div>
                        </div>

                        <div class="card-footer">

                            <a href="{{url("admin/payroll")}}" class="btn btn-default">Back</a>

                          </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
@endsection

