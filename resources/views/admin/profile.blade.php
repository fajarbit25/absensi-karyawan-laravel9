@extends('layout.template')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2> {{ $title }} </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="/employee"><i class="fa fa-arrow-left"></i></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('storage/'.$user[0]->img) }}" alt="img" style="width:100%;">
            </div>
            <div class="col-lg-8">
                <ul class="list-group">
                    <form action="/profile" method="post" enctype="multipart/form-data" >
                        @csrf
                        <li class="list-group-item">
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" value="{{ $user[0]->img  }}" />
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <input type="text" name="nik" class="form-control" value="{{ $user[0]->nik }}" readonly/>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ $user[0]->name }}"/>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" value="{{ $user[0]->email }}"/>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{ $user[0]->phone }}"/>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <textarea name="address" id="address" class="form-control" rows="2">{{ $user[0]->address }}</textarea>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button type="submit" class="btn btn-success"> Update </button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection