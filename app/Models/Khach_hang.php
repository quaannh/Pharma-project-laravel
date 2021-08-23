<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khach_hang extends Model
{
    protected $table = 'khach_hang';
    protected $fillable = [
      'id',
      'ho_kh',
      'ten_kh',
      'dia_chi',
      'dien_thoai',
      'email',
      'thanh_vien',
     
  ];
}
