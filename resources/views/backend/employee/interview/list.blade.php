manager list


@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Interview</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6" style="text-align: right">

            <form action="{{url('admin/manager_export')}}" method="get">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">

                <input type="hidden" name="end_date" value="{{Request()->end_date}}">

                <a href="{{url('admin/manager_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}" class="btn btn-success">Excel Export</a>
            </form>
            <br>
            <a href="{{url("admin/manager/add")}}" class="btn btn-primary mb-2">Add Manager</a>
          </div><!-- /.col --> --}}
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
                       <h3 class="card-title">Search Manager</h3>
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
                                    <label for="">Manager Name</label>
                                    <input type="text"
                                    value="{{Request()->manager_name}}" name="manager_name" class="form-control"
                                    placeholder="Manager Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Manager Email</label>
                                    <input type="email"
                                    value="{{Request()->postal_code}}" name="manager_email" class="form-control"
                                    placeholder="Manager Email">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Manager Phone</label>
                                    <input type="number"
                                    value="{{Request()->manager_mobile}}" name="manager_mobile" class="form-control"
                                    placeholder="Manager Phone">
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
                                </div>


                                <div class="form-group col-md-2">
                                    <button type="submit"   class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                    <a href="{{url("admin/manager")}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                   </div> --}}
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Interview List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Interview</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{$getRecord->id}}</td>
                                        <td>{{$getRecord->name}}</td>
                                        <td>{{$getRecord->salary}}</td>
                                        <td>
                                         @if ($getRecord->interview==0)
                                             Canceled
                                         @elseif ($getRecord->interview==1)
                                         Pending
                                         @else
                                             Completed
                                         @endif
                                        </td>


                                        <td>{{date('d-m-Y ',strtotime($getRecord->created_at))}}</td>
                                        <td>{{date('d-m-Y ',strtotime($getRecord->updated_at))}}</td>

                                    </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
   @endsection
