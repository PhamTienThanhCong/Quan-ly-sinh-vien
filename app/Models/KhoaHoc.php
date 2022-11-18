<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $table = 'khoa_hocs';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ma_khoa_hoc',
        'nam_bat_dau',
    ];

}
