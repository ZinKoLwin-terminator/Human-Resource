

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Regions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Regions</li>
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
                                Edit Regions
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/regions/edit/".$getRecord->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Region Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="region_name"
                                value="{{$getRecord->region_name}}" class="form-control" required placeholder="Enter Region Name">
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/regions")}}" class="btn btn-default ">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                       </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

  </div>
   @endsection
