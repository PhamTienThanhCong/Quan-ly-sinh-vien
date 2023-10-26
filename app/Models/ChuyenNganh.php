<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenNganh extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [ // bảng chuyên ngành
        'ma_chuyen_nganh',
        'ten_chuyen_nganh',
        'ma_khoa',
    ];


    protected $primaryKey = 'ma_chuyen_nganh';
}
