<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    protected $table = 'giang_viens';

    protected $fillable = [
        'ma_giang_vien',
        'ho_ten',
        'gioi_tinh',
        'sinh_nhat',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'avatar',
        'ma_khoa',
        'hoc_van',
        'chuyen_mon',
        'ghi_chu',
    ];

    protected $primaryKey = 'ma_giang_vien';

    public $incrementing = false;

    // config giới tính
    public function getGioiTinhAttribute($value)
    {
        if ($value == 1) {
            return 'Nam';
        } else {
            return 'Nữ';
        }
    }
    // config ngày sinh

}
