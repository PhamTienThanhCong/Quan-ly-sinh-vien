<?php

namespace App\Imports;

use App\Models\SinhVien;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SinhVien([
            'ma_sinh_vien' => $row[0],
            'ho_ten' => $row[1],
            'gioi_tinh' => $row[2],
            'ngay_sinh' => $row[3],
            'email ' => $row[0] . "@dreamschool.com",
            'so_dien_thoai' => $row[4],
            'dia_chi' => $row[5],
            'ma_khoa' => $row[6],
            'ma_chuyen_nganh' => $row[7],
            'ma_lop' => $row[8],
            'sv_khoa' => $row[9],
            'password' => bcrypt($row[0]),
        ]);
    }
}
