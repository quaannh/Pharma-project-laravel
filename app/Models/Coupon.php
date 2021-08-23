<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    protected $fillable = [
      'id',
      'ma_code',
      'loai_code',
      'gia_tri',
      'han_su_dung',
      'trang_thai'
  ];


}
