

@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">

            {{-- <form action="{{url("admin/job_history_export")}}" method="GET">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">
                <input type="hidden" name="end_date" value="{{Request()->end_date}}">
                <a href="{{url('admin/job_history_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}" class="btn btn-success">Excel Export</a>
            </form>
            <br> --}}
            <a href="{{url("admin/payroll/add")}}" class="btn btn-primary mb-2">Add Pay Roll</a>
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
                        <h3 class="card_title">Search Jobs History List</h3>
                    </div>

                    <form action="" method="get">
                           <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" name="id" value="{{request()->id}}" placeholder="ID">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Employee Name</label>
                                    <input type="text" class="form-control" name="name" value="{{request()->name}}" placeholder="Employee Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Start Date</label>
                                    <input type="date" class="form-control" value="{{request()->start_date}}" name="start_date">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control" value="{{request()->end_date}}" name="end_date">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Job Title</label>
                                    <input type="text" class="form-control" value="{{request()->job_title}}" name="job_title"
                                    placeholder="Job Title">
                                </div>

                                <div class="form-group col-md-2">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{url('admin/job_history')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                </div>

                            </div>
                           </div>
                    </form>
                   </div> --}}

                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Pay Roll List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Number of Day Work</th>
                                        <th>Bonus</th>
                                        <th>Overtime</th>

                                        {{-- <th>Created At</th> --}}
                                       <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                   <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{!empty($value->get_employee_name_single->name)?$value->get_employee_name_single->name   :""}} {{!empty($value->get_employee_name_single->last_name)?$value->get_employee_name_single->last_name :""}}</td>
                                    <td>{{$value->number_of_day_work}}</td>
                                    <td>{{$value->bonus}}</td>
                                    <td>{{$value->overtime}}</td>
                                    {{-- <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td> --}}


                                    <td>

                                        <a href="{{url('admin/payroll/view/'.$value->id)}}" class="btn btn-info">View</a>
                                        {{-- <a href="{{url('admin/job_history/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a> --}}
                                    </td>

                                   </tr>
                                   @empty
                                   <tr>
                                    <td colspan="100%" style="text-align: center">No Record Found</td>
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
