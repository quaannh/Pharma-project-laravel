<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tin_tuc extends Model
{
    protected $table ='tin_tuc';
    protected $fillable = [
        'tieu_de',
        'hinh_tin_tuc',
        'tom_tat',
        'chi_tiet',
        'tac_gia',
        'nhan_vien',
        'trang_thai'
    ];
}
