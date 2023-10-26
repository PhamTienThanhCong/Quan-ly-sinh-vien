<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_khoa',
        'ten_khoa',
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ma_khoa';

}
