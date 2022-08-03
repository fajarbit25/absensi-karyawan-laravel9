<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upersons extends Model
{
    protected $fillable = ['nik', 'name', 'email', 'phone', 'address', 'img', 'idlevel', 'idcompany', 'token_validate', 'is_actived'];
}
