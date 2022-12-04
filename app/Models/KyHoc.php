<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyHoc extends Model
{
    use HasFactory;
    protected $table = 'ky_hocs';
    protected $fillable = [
        'nam_hoc',
        'hoc_ky',
        'khoas',
    ];

    // tong_sv_theo_khoas
    public function tong_sv_theo_khoa(){
        $khoa = $this->khoas;
        $khoa = explode(',', $khoa);
        $tong_sv = SinhVien::whereIn('sv_khoa', $khoa)->count();
        return $tong_sv;
    }
}
