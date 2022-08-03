@extends('layout.template')
@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2> Search <small> Insert Date </small></h2>
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
                    <form action="/all_report_search" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="level_code" class="form-control" value="All" required autocomplete="off" readonly/>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="date" name="tanggal" class="form-control" @if($tanggalKey) value="{{ $tanggalKey }}" @endif required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-lg-2 col-sm-2">
                                <button type="submit" class="btn btn-primary btn-block" > Search </button>
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
        <h2>{{  $title }} <small> Report In {{ $tanggal }} </small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="table-responsive">
            <table class="table bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Nik</th>
                        <th>Name</th>
                        <th>Keterangan</th>
                        <th>Check In Times</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($person as $p)
                    <tr>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->name }}</td>
                        <td>
                            @if (substr($p->token_validate, 0, 10) == $tanggal)
                                <span class="badge badge-success">Masuk</span>
                            @else
                                <span class="badge badge-warning">Tidak Masuk</span>
                            @endif
                        </td>
                        <td>
                            @if (substr($p->token_validate, 0, 10) == $tanggal)
                                {{ Str::of($p->token_validate)->substr(11,16) }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection