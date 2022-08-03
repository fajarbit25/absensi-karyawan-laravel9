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
                <a class="dropdown-item" href="create_company">New Company</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Name</th>
                                <th>Register Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($company as $c)
                            <tr>
                                <td>
                                    <a href="/show_company/{{ $c->company_code }}">{{ $c->company_code }}</a>
                                </td>
                                <td>{{ $c->company_name }}</td>
                                <td>{{ $c->created_at }}</td>
                                <td>
                                    <form action="/delete_company" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $c->id }}" required>
                                        <button type="submit" class="badge badge-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
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