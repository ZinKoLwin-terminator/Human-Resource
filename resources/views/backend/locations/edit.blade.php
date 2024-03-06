

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Locations</li>
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
                                Edit Locations
                            </h3>
                        </div>
                        <form action="" class="form-horizontal" method="POST" accept="{{url("admin/locations/edit/".$getRecord->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Street Address<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="street_address"
                                value="{{$getRecord->street_address}}" class="form-control" required placeholder="Enter Street Address">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Postal Code<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="postal_code"
                                value="{{$getRecord->postal_code}}" class="form-control" required placeholder="Enter Postal Code">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">City<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="city"
                                value="{{$getRecord->city}}" class="form-control" required placeholder="Enter City">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">State Provice<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="state_provice"
                                value="{{$getRecord->state_provice}}" class="form-control" required placeholder="Enter State Provice">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Country Name <br>(Country Id)<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                               <select class="form-control" name="countries_id" id="">
                                <option value="">Select Country Name</option>
                                @foreach ($getCountries as $country)
                                    <option value="{{$country->id}}" {{($getRecord->countries_id==$country->id)?"selected":""}}>{{$country->country_name}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>


                       </div>

                       <div class="card-footer">

                        <a href="{{url("admin/locations")}}" class="btn btn-default ">Back</a>
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
