@extends('layout.template')
@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>{{  $title }} 
            <small> Report In {{ date('Y-m-d') }} 
            </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <form action="/all_report_search" method="post">
                    @csrf
                    <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}" />
                    <button type="submit" class="btn btn-info btn-sm"> <span class="badge badge-info text-light"> All Report </span></button> 
                </form>
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