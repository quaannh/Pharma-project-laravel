<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanh_vien extends Model
{
    protected $table = 'thanh_vien';
    protected $fillable = [
      'id',
      'ho_thanh_vien',
      'ten_thanh_vien',
      'gioi_tinh',
      'sinh_nhat',
      'dia_chi',
      'hinh_dai_dien',
      'dien_thoai',
      'email',
      'password',
      'ma_thanh_vien',
      'hang_thanh_vien',
      'tong_chi',
      
  ];
}
