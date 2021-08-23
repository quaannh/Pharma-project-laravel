<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table ='slider';
    protected $fillable = [
        'ten_slider',
        'tieu_de',
        'hinh_slider',
        'noi_dung',
        'url',
        'trang_thai'
    ];
}
