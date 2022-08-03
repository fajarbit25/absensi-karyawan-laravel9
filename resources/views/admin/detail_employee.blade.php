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
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
                @if ($data[0]->is_actived == 0)
                    <form action="/acc_employee" method="post">
                        @csrf
                        <input type="hidden" name="nik" value="{{ $data[0]->nik }}">
                        <button type="submit" class="dropdown-item">Accept</button>
                    </form>
                @elseif($data[0]->is_actived == 9)
                    <form action="/enable_employee" method="post">
                        @csrf
                        <input type="hidden" name="nik" value="{{ $data[0]->nik }}">
                        <button type="submit" class="dropdown-item">Enable User</button>
                    </form>
                @else
                    <form action="/disable_employee" method="post">
                        @csrf
                        <input type="hidden" name="nik" value="{{ $data[0]->nik }}">
                        <button type="submit" class="dropdown-item">Disable User</button>
                    </form>
                @endif
                </div>
            </li>
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
                <img src="{{ asset('storage/'.$data[0]->img) }}" alt="img" style="width:100%;">
            </div>
            <div class="col-lg-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> NIK </strong>
                    <span class="rounded-pill">{{ $data[0]->nik }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> NAME </strong>
                    <span class="rounded-pill">{{ $data[0]->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> EMAIL </strong>
                    <span class="rounded-pill">{{ $data[0]->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> PHONE </strong>
                    <span class="rounded-pill">{{ $data[0]->phone }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> COMPANY </strong>
                    <span class="rounded-pill">{{ $data[0]->company_name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> LEVEL </strong>
                    <span class="rounded-pill">{{ $data[0]->level_code }} | {{ $data[0]->level_name }} </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> ADDRESS </strong>
                    <span class="rounded-pill">{{ $data[0]->address }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><i class="fa fa-arrow-right"></i> STATUS USER </strong>
                    @if ($data[0]->is_actived == 1)
                        <span class="badge badge-success rounded-pill">Actived</span>
                    @elseif($data[0]->is_actived == 9)
                        <span class="badge badge-danger rounded-pill">Disable</span>
                    @else
                        <span class="badge badge-warning rounded-pill">Pending</span>
                    @endif
                </li>

            </ul>
            </div>
        </div>
    </div>
</div>
@endsection