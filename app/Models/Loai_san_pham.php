<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_san_pham extends Model
{
    protected $table ='loai_san_pham';
    protected $fillable = [
        'ten_loai',
        'hinh',
        'ghi_chu',
        'trang_thai'
    ];
}
