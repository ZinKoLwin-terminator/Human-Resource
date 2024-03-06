
@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">

            {{-- <form action="{{url('admin/jobs_export')}}" method="get">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">

                <input type="hidden" name="end_date" value="{{Request()->end_date}}">

                <a href="{{url('admin/jobs_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}" class="btn btn-success">Excel Export</a>
            </form> --}}
            {{-- <br> --}}
            <a href="{{url("admin/countries/add")}}" class="btn btn-primary mb-2">Add Countries</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
           <div class="row">
                <section class="col-md-12">
                   {{-- <div class="card">
                    <div class="card-header">
                       <h3 class="card-title">Search Countries</h3>
                    </div>
                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control"
                                    value="{{Request()->id}}"
                                    placeholder="ID">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Country Name</label>
                                    <input type="text"
                                    value="{{Request()->country_name}}" name="country_name" class="form-control"
                                    placeholder="Country Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Region Name</label>
                                    <input type="text"
                                    value="{{Request()->regions_id}}" name="regions_id" class="form-control"
                                    placeholder="Region Name">
                                </div>

                                <div class="form-group col-md-2">
                                    <button type="submit"   class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                    <a href="{{url("admin/regions")}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                   </div> --}}
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Regions List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Country Name</th>
                                        <th>Regions Name <br>(Region ID)</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                       <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->country_name}}</td>
                                        <td>{{!empty($value->region->region_name)?$value->region->region_name:""}}</td>

                                        <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                        <td>{{date('d-m-Y H:i A',strtotime($value->updated_at))}}</td>
                                        <td>

                                            <a href="{{url('admin/countries/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/countries/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td style="text-align: center" colspan="100%">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div style="padding:10px;float:right;">
                                {{$getRecord->links()}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
   @endsection
