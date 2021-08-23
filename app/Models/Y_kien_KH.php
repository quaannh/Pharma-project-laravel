<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Y_kien_KH extends Model
{
    protected $table = 'y_kien_khach_hang';
    protected $fillable = [
    'id',
    'ho_ten_khach_hang',
    'dia_chi',
    'dien_thoai',
    'email',
    'noi_dung',
    'hinh',
    'noi_dung_tra_loi',
    'trang_thai',
    'muc_dich'
  ];
}
