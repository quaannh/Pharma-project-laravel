<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San_pham extends Model
{
    protected $table ='san_pham';
    protected $fillable = [
        'ten_san_pham',
        'ten_url',
        'hinh_san_pham',
        'gia_san_pham',
        'giam_gia',
        'mo_ta_tom_tat',
        'chi_tiết',
        'trang_thai', 
        'ma_loai',  
        'don_vi',
        'nguon_goc',
        
    ];
}
