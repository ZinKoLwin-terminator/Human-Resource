

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Countries</li>
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
                                Edit Countries
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/countries/edit/".$getRecord->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Country Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="country_name"
                                value="{{$getRecord->country_name}}" class="form-control" required placeholder="Enter Country Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Region Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control"
                                name="regions_id" id="">
                             <option value="">Select Regions Name</option>
                            @foreach ($getRegions as $region)
                                <option value="{{$region->id}}" {{($region->id==$getRecord->regions_id)?"selected":""}}>{{$region->region_name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/countries")}}" class="btn btn-default ">Back</a>
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
