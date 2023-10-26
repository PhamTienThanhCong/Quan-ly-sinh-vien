<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SinhVien extends Authenticatable
{
    use HasFactory;
    protected $table = 'sinh_viens';
    protected $primaryKey = 'ma_sinh_vien';
    protected $guard = 'user';
    protected $fillable = [
        'id',
        'email',
        'password',
        'name',
        'phone',
        'address',
        'ma_khoa',
        'ma_lop',
        'ma_chuyen_nganh',
        'avatar',
        'created_at',
        'updated_at',
    ];
}
