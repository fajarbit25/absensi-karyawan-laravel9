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
                    <li><a class="dropdown-item" href="create_employee">Create Employee</a>
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
        <form method="post" action="/create_employee" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
            <input type="hidden" name="token_validate" value="{{date('Ymd')}}"/>
            <input type="hidden" name="is_actived" value="0"/>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Nik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="nik" name="nik"  required="required" autocomplete="off" class="form-control" autofocus>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
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
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="phone" name="phone"  required="required" autocomplete="off" class="form-control ">
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Image <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" id="img" name="img" value="production/images/user.png"  required="required" autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idcompany">Company <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="idcompany" id="idcompany" class="form-control">
                        @foreach($company as $c)
                        <option value="{{ $c->id }}">{{ $c->company_code }} | {{ $c->company_name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idlevel">Level <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="idlevel" id="idlevel" class="form-control">
                        @foreach($level as $l)
                        <option value="{{ $l->id }}"> {{ $l->level_code }} | {{  $l->level_name   }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Address <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea name="address" id="address" class="form-control" rows="3"></textarea>
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