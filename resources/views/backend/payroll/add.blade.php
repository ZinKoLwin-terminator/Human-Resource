


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
                        {{-- <form action="" class="form-horizontal" method="POST" accept="{{url("admin/payroll/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Employee Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="employee_id" id="">
                                    <option value="">Select Employee Name</option>
                                    @foreach ($getEmployees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Start Date<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="start_date"
                                value="{{old('start_date')}}" class="form-control" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">End Date<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="end_date"
                                value="{{old('end_date')}}" class="form-control" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Job Name(Job ID)<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="job_id" id="">
                                    <option value="">Select Job Name</option>
                                    @foreach ($getJobs as $job)
                                    <option value="{{$job->id}}">{{$job->job_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Department Name(Department ID)<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id" id="">
                                    <option value=""> Select Department Name</option>

                                   @foreach ($getDepartments as $department)
                                   <option value="{{$department->id}}">{{$department->department_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/job_history")}}" class="btn btn-default ">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>



                       </div>

                    </form> --}}
                    </div>
                </div>
            </div>
        </div>

    </section>

  </div>
   @endsection
