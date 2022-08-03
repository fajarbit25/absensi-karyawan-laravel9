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
                <div class="card-box">
                    <form action="/update_company" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $company[0]->id }}">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="company_code" class="form-control" value="{{ $company[0]->company_code }}" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="company_name" class="form-control" value="{{ $company[0]->company_name }}" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 mb-3">
                                <textarea name="company_address" id="company_address" cols="" rows="3" class="form-control" required>{{ $company[0]->company_address }}</textarea>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <button type="submit" name="submit" class="btn btn-success"> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection