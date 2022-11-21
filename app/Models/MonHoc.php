<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'mon_hocs';
    protected $primaryKey = 'ma_mon_hoc';
    protected $fillable = [
        'ma_mon_hoc',
        'ten_mon_hoc',
        'so_tin_chi',
        'khoa',
    ];
}
