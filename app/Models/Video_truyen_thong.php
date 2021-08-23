<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_truyen_thong extends Model
{
    protected $table ='video_truyen_thong';
    protected $fillable = [
        'ten_video',
        'nguon_video',
        'ma_nhung',
    ];
}
