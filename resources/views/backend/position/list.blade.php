

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Positions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">
            <a href="{{url('admin/position_export')}}" class="btn btn-success">Excel Export</a>

            <a href="{{url("admin/position/add")}}" class="btn btn-primary mb-2">Add Position</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
           <div class="row">
                <section class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                       <h3 class="card-title">Search Location</h3>
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
                                    <label for="">Position Name</label>
                                    <input type="text"
                                    value="{{Request()->position_name}}" name="position_name" class="form-control"
                                    placeholder="Position Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Daily Rate</label>
                                    <input type="text"
                                    value="{{Request()->daily_rate}}" name="daily_rate" class="form-control"
                                    placeholder="Daily Rate">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Monthly Rate</label>
                                    <input type="text"
                                    value="{{Request()->monthly_rate}}" name="monthly_rate" class="form-control"
                                    placeholder="Monthly Rate">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Working Days Per Month</label>
                                    <input type="text"
                                    value="{{Request()->working_days_per_month}}" name="working_days_per_month" class="form-control"
                                    placeholder="Working Days Per Month">
                                </div>



                                {{-- <div class="form-group col-md-3">
                                    <label for="">Created At</label>
                                    <input type="date"
                                    value="{{Request()->created_at}}" name="created_at" class="form-control"
                                   >
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Updated At</label>
                                    <input type="date"
                                    value="{{Request()->updated_at}}" name="updated_at" class="form-control"
                                   >
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">From Date(Start Date)</label>
                                    <input type="date"
                                    value="{{Request()->start_date}}" name="start_date" class="form-control"
                                   >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">To Date(End Date)</label>
                                    <input type="date"
                                    value="{{Request()->end_date}}" name="end_date" class="form-control"
                                   >
                                </div> --}}
                                <div class="form-group col-md-2">
                                    <button type="submit"   class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                    <a href="{{url("admin/position")}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                   </div>
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Position List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Position Name</th>
                                        <th>Daily Rate</th>
                                        <th>Monthly Rate</th>
                                        <th>Working Days Per Month</th>
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
                                        <td>{{$value->position_name}}</td>
                                        <td>{{$value->daily_rate}}</td>
                                        <td>{{$value->monthly_rate}}</td>
                                        <td>{{$value->working_days_per_month}}</td>

                                        <td>{{date('d-m-Y H:s:i',strtotime($value->created_at))}}</td>
                                        <td>{{date('d-m-Y H:s:i',strtotime($value->updated_at))}}</td>

                                        <td>

                                            <a href="{{url('admin/position/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/position/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
