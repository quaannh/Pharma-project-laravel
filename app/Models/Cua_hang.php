<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cua_hang extends Model
{
    protected $table ='cua_hang';
    protected $fillable = [
        'ten_cua_hang',
        'dia_chi',
        'dien_thoai',
        'email',
        'ma_nhung'
    ];
}
