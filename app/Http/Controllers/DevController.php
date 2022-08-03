<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
        $data = array(
            'Team'      => 'TBNinc_',
            'Product'   => 'Kaloon',
            'Divisi'    => 'Jasa Pembuatan Website',
            'Situs'     => 'Null',
            'Owners'    => 'Fajar Ramadana',
            'Email'     => 'fajarramadana25@gmail.com',
            'Phone'     => '0895330078691',
            'Telegram'  => '@PatriicStar',
            'Whatsapp'  => '0895330078691',
            'Instagram' => 'fajarramadana_'
        );
        dd($data);
    }
}
