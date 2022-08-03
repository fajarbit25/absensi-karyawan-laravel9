@extends('layout.template')
@section('content')

<div class="row">
    <div class="col-lg-3 col-sm-3">
        <div class="card bg-primary text-light mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6" style="font-size: 30px;">
                    <strong>
                        <span>{{ $user }}</span>
                    </strong>
                </div>
                <div class="col-lg-6 col-md-6">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-lg-12 col-md-12">
                    <strong>User Active</strong>
                    <a href="/user" class="text-light"><i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3">
        <div class="card bg-success text-light mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6" style="font-size: 30px;">
                    <strong>
                        <span>{{ $checkin }}/{{ $user }}</span>
                    </strong>
                </div>
                <div class="col-lg-6 col-md-6">
                    <i class="fa fa-th fa-5x"></i>
                </div>
                <div class="col-lg-12 col-md-12">
                    <strong>Absensi</strong>
                    <a href="/report" class="text-light"><i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3">
        <div class="card bg-warning text-light mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6" style="font-size: 30px;">
                    <strong>
                        <span>{{ $company }}</span>
                    </strong>
                </div>
                <div class="col-lg-6 col-md-6">
                    <i class="fa fa-university fa-5x"></i>
                </div>
                <div class="col-lg-12 col-md-12">
                    <strong>Company</strong>
                    <a href="/company" class="text-light"><i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-3">
        <div class="card bg-danger text-light mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 col-md-6" style="font-size: 30px;">
                    <strong>
                        <span>{{ $level }}</span>
                    </strong>
                </div>
                <div class="col-lg-6 col-md-6">
                    <i class="fa fa-line-chart fa-5x"></i>
                </div>
                <div class="col-lg-12 col-md-12">
                    <strong>Level</strong>
                    <a href="/level" class="text-light"><i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <h2>{{  $title }} <small> Attendance App </small></h2>
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
@endsection