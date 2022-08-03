@extends('layout.template')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>Form Absesnsi <small>Staff Only</small></h2>
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
        <form method="post" action="/check_in" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf
            @error('tanggal')
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Warning!</strong> Anda telah melakukan absensi untuk hari ini..
                </div>
            @enderror
            <input type="hidden" name="tanggal" value="{{date('Y-m-d')}}">
            <div class="form-group text-center">
                <h1><i class="bi bi-clock-history"></i> {{ date('d F Y') }} </h1>
                <h3><i class="bi bi-calendar4-week"></i> {{ date('l') }} </h3>
            </div>
            
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Insert Nik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nik" name="nik" value="{{$data[0]->nik}}" required="required" autocomplete="off" autofocus class="form-control ">
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="name" name="name" value="{{$data[0]->name}}" required="required" autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Level <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="level" name="level" value="{{$data[0]->level_name}}" required="required" autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company">Company <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="company" name="company" value="{{$data[0]->company_name}}" required="required" autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3 d-grid gap-2">
                    <button class="btn btn-primary btn-block" type="submit"><i class="bi bi-check-circle"></i> Submit</button>
                    <a class="btn btn-danger btn-block" href="/"><i class="bi bi-x-circle"></i> Cancel</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection