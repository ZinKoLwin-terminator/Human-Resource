
@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">

            {{-- <form action="{{url('admin/countries_export')}}" method="get">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">

                <input type="hidden" name="end_date" value="{{Request()->end_date}}">

                <a href="{{url('admin/countries_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}" class="btn btn-success">Excel Export</a>
            </form>

            <br> --}}
            <a href="{{url("admin/departments/add")}}" class="btn btn-primary mb-2">Add Departments</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
           <div class="row">
                <section class="col-md-12">
                    {{-- Search Box End --}}
                 <div class="card">
                    <div class="card-header">
                       <h3 class="card-title">Search Department</h3>
                    </div>
                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control"
                                    value="{{Request()->id}}"
                                    placeholder="ID">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Department Name</label>
                                    <input type="text"
                                    value="{{Request()->department_name}}" name="department_name" class="form-control"
                                    placeholder="Department Name">
                                </div>
                                {{-- <div class="form-group col-md-3">
                                    <label for="">Manager Name</label>
                                    <input type="text"
                                    value="{{Request()->manager_name}}" name="manager_name" class="form-control"
                                    placeholder="Manager Name">
                                </div> --}}

                                <div class="form-group col-md-4">
                                    <label for="">Location Name</label>
                                    <input type="text"
                                    value="{{Request()->street_address}}" name="street_address" class="form-control"
                                    placeholder="Location Name">
                                </div>

                                {{-- <div class="form-group col-md-4">
                                    <label for="">From Date(Start Date)</label>
                                    <input type="date"
                                    value="{{Request()->start_date}}" name="start_date" class="form-control"
                                   >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">To Date(End Date)</label>
                                    <input type="date"
                                    value="{{Request()->end_date}}" name="end_date" class="form-control"
                                   >
                                </div> --}}

                                <div class="form-group col-md-2">
                                    <button type="submit"   class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                    <a href="{{url("admin/departments")}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                   </div>

                 {{-- Search Box End --}}
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Departments List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department Name</th>
                                        <th>Manager Name</th>
                                        <th>Location Name</th>
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
                                        <td>{{$value->department_name}}</td>
                                        <td>
                                            @if ($value->manager_id==1)
                                                Mg Mg
                                            @else
                                                Zaw Zaw
                                            @endif
                                        </td>
                                        <td>{{$value->street_address}}</td>

                                        <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                        <td>{{date('d-m-Y H:i A',strtotime($value->updated_at))}}</td>
                                        <td>

                                            <a href="{{url('admin/locations/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/locations/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
