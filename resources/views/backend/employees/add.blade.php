

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                                Add Employees
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/employees/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">First Name <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Last Name <span style="color:red"></span></label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control"  placeholder="Enter Last Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required placeholder="Enter Email ID">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Phone Number <span style="color:red"></span></label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control"  placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Hire Date <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="hire_date " class="form-control" required placeholder="Enter Hire Date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Job ID<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="job_id" id="" required>
                                    <option value="">Select Job Title</option>
                                    <option value="1">Web Developer</option>
                                    <option value="2">PDF Developer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Salary<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="salary" class="form-control" required placeholder="Enter Salary">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Commision PCT<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="commission_pct" class="form-control" required placeholder="Enter Commision PCT">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Manager Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="job_id" id="" required>
                                    <option value="">Select Manager Name</option>
                                    <option value="1">XYZ</option>
                                    <option value="2">ABC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Department Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id" id="" required>
                                    <option value="">Select Department Name</option>
                                    <option value="1">Developer Department</option>
                                    <option value="2">BDM Department</option>
                                </select>
                            </div>
                        </div>
                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/employees")}}" class="btn btn-default ">Back</a>
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
