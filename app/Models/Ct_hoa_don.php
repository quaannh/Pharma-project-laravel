<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_hoa_don extends Model
{
    protected $table ='ct_hoa_don';
    protected $fillable = [
        'id_sohd',
        'ma_san_pham',
        'so_luong',
        'don_gia'
    ];
}
