<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoa_don extends Model
{
    protected $table ='hoa_don';
    protected $fillable = [
        'ngay_hoa_don',
        'id_ma_kh',
        'tong_tien',
        'dat_coc',
        'con_lai',
        'trang_thai'.
        'uu_dai_thanh_vien',
        'nhap_coupon',
        'ma_coupon'
    ];
}
