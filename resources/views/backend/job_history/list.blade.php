
@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">


            <a href="{{url("admin/job_history/add")}}" class="btn btn-primary mb-2">Add Job History</a>
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

                    </div>

                   </div> --}}

                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Job History List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name <br>(employee_id)</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Job Name <br>(job_id)</th>
                                        <th>Department Name <br>
                                            (department_id)</th>
                                        <th>Created At</th>
                                       {{-- <th>
                                            Actions
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                   <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{!empty($value->Employee->name)?$value->Employee->name:""}} {{!empty($value->Employee->last_name)?$value->Employee->last_name:""}}</td>
                                    <td>{{date('d-m-Y',strtotime($value->start_date))}}</td>
                                    <td>{{date('d-m-Y',strtotime($value->end_date))}}</td>
                                    <td>{{!empty($value->Job->job_title)?$value->Job->job_title:""}}</td>
                                    <td>@if (!empty($value->department_id==1))
                                        Developer Department
                                    @else
                                        BDM Department
                                    @endif</td>
                                    <td>{{date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                                    {{-- <td>
                                        <a href="{{url('admin/job_history/view/'.$value->id)}}" class="btn btn-info">View</a>
                                        <a href="{{url('admin/job_history/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/job_history/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                    </td> --}}
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
