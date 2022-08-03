<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklocks extends Model
{
    protected $fillable = ['idperson', 'tanggal', 'check_in', 'check_out'];
}
