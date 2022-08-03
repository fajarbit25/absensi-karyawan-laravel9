@extends('layout.template')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>{{  $title }} <small> New Level </small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <form action="/new_level" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="level_code" class="form-control" placeholder="Code.." required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="text" name="level_name" class="form-control" placeholder="Name.." required autocomplete="off"/>
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block" > Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="x_panel">
    <div class="x_title">
        <h2>{{  $title }} <small> Result </small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                <th>Level Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($level as $l)
                            <tr>
                                <td>{{ $l->level_code }}</td>
                                <td>{{ $l->level_name }}</td>
                                <td>
                                    <form action="/level_delete" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $l->id }}" required>
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