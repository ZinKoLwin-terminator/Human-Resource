

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


                <a href="{{url('admin/payroll_export')}}" class="btn btn-success">Excel Export</a>

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

                   <div class="card">
                    <div class="card-header">
                        <h3 class="card_title">Search Pay Roll List</h3>
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
                                    <input type="text" class="form-control" name="name" value="{{request()->name}}" placeholder="Enter Employee Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Number Of Day Work</label>
                                    <input type="text" class="form-control" name="number_of_day_work" value="{{request()->number_of_day_work}}" placeholder="Enter Number Of Day Work">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Bonus</label>
                                    <input type="text" class="form-control" name="bonus" value="{{request()->bonus}}" placeholder="Enter Bonus">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Overtime</label>
                                    <input type="text" class="form-control" name="overtime" value="{{request()->overtime}}" placeholder="Enter Overtime">
                                </div>


                                <div class="form-group col-md-2">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href="{{url('admin/payroll')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                </div>

                            </div>
                           </div>
                    </form>
                   </div>

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

                                    @php
                                        $totalNumberOfDayWork=0;
                                        $totalBonus = 0;
                                        $totalOvertime=0;
                                    @endphp

                                    @foreach ($getRecord as $value)
                                    @php
                                        $totalNumberOfDayWork=$totalNumberOfDayWork+$value->number_of_day_work;
                                        $totalBonus=$totalBonus+$value->bonus;
                                        $totalOvertime=$totalOvertime+$value->overtime;
                                    @endphp
                                   <tr>
                                    <td>{{$value->id}}</td>

                                    <td>{{!empty($value->name)?$value->name:""}} {{!empty($value->last_name)?$value->last_name:""}}</td>
                                    <td>{{$value->number_of_day_work}}</td>
                                    <td>{{$value->bonus}}</td>
                                    <td>{{$value->overtime}}</td>
                                    {{-- <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td> --}}


                                    <td>

                                        <a href="{{url('admin/payroll/view/'.$value->id)}}" class="btn btn-info">View</a>
                                        <a href="{{url('admin/payroll/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/payroll/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                    </td>

                                   </tr>
                                   @endforeach

                                   <tr>
                                    <th colspan="2">Total All</th>
                                    <td>{{$totalNumberOfDayWork}}</td>
                                    <td>{{$totalBonus}}</td>
                                    <td>{{$totalOvertime}}</td>

                                    <th colspan="1"></th>

                                   </tr>

                                   {{-- @empty
                                   <tr>
                                    <td colspan="100%" style="text-align: center">No Record Found</td>
                                   </tr> --}}

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
