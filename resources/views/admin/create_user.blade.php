@extends('layout.template')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2> {{ $title }} <small>Manage Users</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">Settings 1</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form method="post" action="/create_user" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf
            @error('nik')
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Warning!</strong> Nik telah terdaftar.
                </div>
            @enderror
            @error('email')
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Warning!</strong> Email telah terdaftar.
                </div>
            @enderror
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Nik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nik" name="nik"  required="required" autocomplete="off" class="form-control" autofocus>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name"  required="required" autocomplete="off" class="form-control ">
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="email" name="email" required="required" autocomplete="off" class="form-control ">
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="text" name="password" required="required" value="telkom123" autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3 d-grid gap-2">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle"></i> Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection