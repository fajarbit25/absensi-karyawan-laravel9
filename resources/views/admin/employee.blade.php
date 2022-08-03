@extends('layout.template')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>{{  $title }} <small> Tanggal {{date('Y-m-d')}}</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="create_employee">Create User</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
        @if (session('success'))
                <div class="alert alert-success col-sm-12">
                    {{ session('success') }}
                </div>
         @endif
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nik</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Register Date</th>
                                <th>Status Employee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $e)
                            <tr>
                                <td>
                                    <a href="/detail_employee/{{$e->id}}">{{ $e->nik }}</a>
                                </td>
                                <td>{{$e->name}}</td>
                                <td>{{$e->email}}</td>
                                <td>{{$e->created_at}}</td>
                                <td>
                                    @if ($e->is_actived == 1)
                                        <span class="badge badge-success">Actived</span>
                                    @elseif($e->is_actived == 9)
                                        <span class="badge badge-danger">Disable</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection