<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SP_trong_kho extends Model
{
    protected $table ='hang_trong_kho';
    protected $fillable = [
        'id',
        'ma_san_pham',
        'sl_trong_kho',
        'sl_da_ban',
        'ngay_nhap',
        'ma_lo_hang',
        'nguon_nhap',
        'han_su_dung',

    ];
}
