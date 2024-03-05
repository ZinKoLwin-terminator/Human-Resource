

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job Grades</li>
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
                                Add Job Grades
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/job_grades/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Grade Level<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="grade_level"
                                value="{{old('grade_level')}}" class="form-control" required placeholder="Enter Grade Level">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Lowest Sal<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="lowest_sal"
                                value="{{old('lowest_sal')}}" class="form-control" required placeholder="Enter Lowest Sal">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Highest Sal<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="highest_sal"
                                value="{{old('highest_sal')}}" class="form-control" required placeholder="Enter Highest Sal">
                            </div>
                        </div>






                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/job_grades")}}" class="btn btn-default ">Back</a>
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
