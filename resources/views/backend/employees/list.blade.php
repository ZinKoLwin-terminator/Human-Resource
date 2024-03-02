
@extends('backend.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">
            <a href="{{url("admin/employees/add")}}" class="btn btn-primary mb-2">Add Employees</a>
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

                       <h3 class="card-title">Search</h3>
                    </div>

                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-1">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control"
                                    value="{{Request()->id}}"
                                    placeholder="ID">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">First Name</label>
                                    <input type="text"
                                    value="{{Request()->name}}" name="name" class="form-control"
                                    placeholder="First Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="{{Request()->last_name}}" class="form-control"
                                    placeholder="Last Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Email ID</label>
                                    <input type="email" name="email" value="{{Request()->email}}" class="form-control"
                                    placeholder="Email ID">
                                </div>

                                <div class="form-group col-md-2">
                                    <button type="submit"   class="btn btn-primary" style="margin-top: 30px;">Search</button>
                                    <a href="{{url("admin/employees")}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                                </div>


                            </div>
                        </div>
                    </form>
                   </div>
                    @include('_messages')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Employees List
                            </h3>
                        </div>
                        <div class="card-body p-0" >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Is Role</th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->last_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{!empty($value->is_role)?'HR':'Employees'}}</td>
                                        <td>
                                            <a href="" class="btn btn-info">View</a>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
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
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
   @endsection
