

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Positions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Position</li>
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
                                Add Position
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/position/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Position Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="position_name"
                                value="{{old('position_name')}}" class="form-control" required placeholder="Enter Position Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Daily Rate<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="daily_rate"
                                value="{{old('daily_rate')}}" class="form-control" required placeholder="Enter Daily Rate">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Monthly Rate<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="monthly_rate"
                                value="{{old('monthly_rate')}}" class="form-control" required placeholder="Enter Monthly Rate">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Working Days Per Month<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="working_days_per_month"
                                value="{{old('working_days_per_month')}}" class="form-control" required placeholder="Enter Working Days Per Month">
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/position")}}" class="btn btn-default ">Back</a>
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
