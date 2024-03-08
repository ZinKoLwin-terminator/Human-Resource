


@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Departments</li>
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
                                Add Departments
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/departments/add")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Department Name<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="department_name"
                                value="{{old('department_name')}}" class="form-control" required placeholder="Enter Department Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Manager Name <br>(Manager Id)<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control"
                                name="manager_id" id="">
                             <option value="">Select Manager Name</option>

                           @foreach ($getManagers as $manager)
                           <option value="{{$manager->id}}">{{$manager->manager_name}}</option>
                           @endforeach

                            {{-- @foreach ($getRegions as $region)
                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @endforeach --}}
                            </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Location Name <br>(Location id)<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control"
                                name="locations_id" id="">
                             <option value="">Select Location Name</option>
                            @foreach ($getLocations as $location)
                                <option value="{{$location->id}}">{{$location->street_address}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/departments")}}" class="btn btn-default ">Back</a>
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
