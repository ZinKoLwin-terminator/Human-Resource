@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                                View Employees
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
                                <label for="" class="col-sm-2 col-form-label">First Name<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->name}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Last Name<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->last_name}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Email ID<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->email}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Phone Number<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->phone_number}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Profile Image<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">

                                    @if ($getRecord->profile_image)
                                    @if (file_exists('upload/'.$getRecord->profile_image))
                                      <img src="{{url("upload/".$getRecord->profile_image)}}" alt="" style="height:60px;width:60px;border-radius: 50%">
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Hire Date<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{date('d-m-Y',strtotime($getRecord->hire_date))}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Job ID<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{-- @foreach ($getJobs as $job)
                                        {{($job->id==$getRecord->job_id)?"$job->job_title":" "}}
                                    @endforeach --}}
            {{!empty($getRecord->get_job_single->job_title)?$getRecord->get_job_single->job_title:""}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Salary<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->salary}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Commission PCT<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{$getRecord->commission_pct}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Manager Name<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{!empty($getRecord->get_manager_name_single->manager_name)?$getRecord->get_manager_name_single->manager_name:""}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Department Name<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{!empty($getRecord->get_department_name_single->department_name)?$getRecord->get_department_name_single->department_name:""}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Is Role<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{!empty($getRecord->is_role)?'HR':'Employees'}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Created Date<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{date('d-m-Y H:i A',strtotime($getRecord->created_at))}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Updated Date<span style="color:red"></span></label>
                                <div class="col-sm-10 mt-1">
                                    {{date('d-m-Y H:i A',strtotime($getRecord->updated_at))}}
                                </div>
                            </div>


                            </div>

                        </div>

                        <div class="card-footer">

                            <a href="{{url("admin/employees")}}" class="btn btn-default ">Back</a>

                          </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
@endsection
