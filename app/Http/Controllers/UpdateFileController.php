<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\ChuyenNganh;
use App\Models\GiangVien;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class UpdateFileController extends Controller
{
    // constructor
    public function index($table){
        if ($table == 'khoas'){
            $page = "Thêm Khoa bằng file excel";
        }elseif($table == 'lops'){
            $page = "Thêm Lớp bằng file excel";
        }elseif($table == 'sinh_viens'){
            $page = "Thêm Sinh viên bằng file excel";
        }elseif($table == 'mon_hoc'){
            $page = "Thêm Môn học bằng file excel";
        }elseif($table == 'giang_viens'){
            $page = "Thêm Giảng viên bằng file excel";
        }elseif($table == 'chuyen_nganhs'){
            $page = "Thêm chuyên ngành bằng file excel";
        }elseif($table == 'diem'){
            $page = "Thêm Điểm bằng file excel";
        }elseif($table == 'mon_hocs'){
            $page = "Thêm Môn học bằng file excel";
        }
        return view('admin.upload.updatefile', compact('page', 'table'));
    }

    

    public function upload($table, Request $request){
        try {
            $inputs = $request->all();

            $fileContent = file_get_contents($inputs['file']->path());
            $enc = mb_detect_encoding($fileContent, mb_list_encodings(), true);
        
            Config::set('excel.imports.csv.input_encoding', $enc);
            $file = $inputs['file'];
            
            // get data from file
            $data = Excel::toArray(new DataImport, $file);

            // import data to table sinh_viens
            $data = $data[0];
            $data[0]['result'] = "Trạng thái";
            for ($i = 1; $i < count($data); $i++) {
                if ($data[$i][0] == null || $data[$i][0] == null) {
                    break;
                }
                if ($table == 'khoas'){
                    $data[$i]['result'] = $this->addKhoa($data[$i]);
                }else if ($table == 'chuyen_nganhs'){
                    $data[$i]['result'] = $this->addChuyenNganh($data[$i]);
                }else if ($table == 'sinh_viens'){
                    $data[$i]['result'] = $this->addSinhVien($data[$i]);
                }else if ($table == 'giang_viens'){
                    $data[$i]['result'] = $this->addGiangVien($data[$i]);
                }else if ($table == 'mon_hocs'){
                    $data[$i]['result'] = $this->addMonHoc($data[$i]);
                }
            }

            $page = "Kết quả sau khi thêm";

            return view('admin.upload.result', compact('data', 'table', 'page'))->with('message', 'Thêm thành công')->with('status', 'Đã thêm thành công');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return redirect()->back()->with('failures', $failures);
        }
    }

    public function addMonHoc($data){
        // check exist
        $monHoc = MonHoc::where('ma_mon_hoc', $data[0])->first();
        if ($monHoc != null){
            return "Mã môn học đã tồn tại";
        }
        // add new 
        $monHoc = new MonHoc();
        $monHoc->ma_mon_hoc = $data[0];
        $monHoc->ten_mon_hoc = $data[1];
        $monHoc->so_tin_chi = $data[2];
        $monHoc->ma_khoa = $data[3];
        $monHoc->ki_hoc = $data[4];
        $monHoc->save();
        
        return "Đã Thêm";
    }

    public function addGiangVien($data){
        // check if exist
        $giangvien = GiangVien::where('ma_giang_vien', $data[0])->first();
        if ($giangvien != null){
            return "Đã tồn tại";
        }
        // add new
        $giangvien = new GiangVien();
        $giangvien->ma_giang_vien = $data[0];
        $giangvien->ho_ten = $data[1];
        // Gioi tinh 1: Nam, 0: Nu
        if ($data[2] == "Nam"){
            $giangvien->gioi_tinh = 1;
        }else{
            $giangvien->gioi_tinh = 0;
        }
        $giangvien->email = $data[0] . "@dremschool.edu.com";
        // ngay sinh to y-d-m
        $ngaysinh = explode("/", $data[3]);
        $giangvien->sinh_nhat = $ngaysinh[2] . "/" . $ngaysinh[1] . "/" . $ngaysinh[0];

        $giangvien->dia_chi = $data[4];
        $giangvien->ma_khoa = $data[5];
        $giangvien->hoc_van = $data[6];
        $giangvien->ghi_chu = $data[7];
        $giangvien->chuyen_mon = $data[8];

        $giangvien->save();

        return "Đã thêm";
    }

    public function addSinhVien($data){
        // check sinh vien
        $sinhVien = SinhVien::where('ma_sinh_vien', $data[0])->first();
        if ($sinhVien != null){
            return "Đã tồn tại";
        }
        // add sinh vien
        $sinhVien = new SinhVien();
        $sinhVien->ma_sinh_vien = $data[0];
        $sinhVien->ho_ten = $data[1];
        // giới tính to 0 - 1
        if ($data[2] == "Nam"){
            $sinhVien->gioi_tinh = 1;
        }else{
            $sinhVien->gioi_tinh = 0;
        }
        // $birth_day = str_replace("2002", "2003", $data[3]); 

        // $sinhVien->ngay_sinh = date ("Y-m-d", strtotime($birth_day));
        $sinhVien->ngay_sinh = date ("Y-m-d", strtotime( $data[3]));
        $sinhVien->dia_chi = $data[4];
        $sinhVien->email = $data[0] . "@st.dremschool.edu.com";
        $sinhVien->password = bcrypt($data[0]);
        $sinhVien->sv_khoa = $data[5];
        $sinhVien->ma_lop = $data[6];
        $sinhVien->ma_chuyen_nganh = $data[7];
        $sinhVien->ma_khoa = $data[8];
        $sinhVien->save();
        return "Đã Thêm";
    }

    public function addKhoa($data){
        // add khoa
        // check khoa
        $check_khoa = Khoa::select('*')->where('ma_khoa', $data[0])->first();
        if ($check_khoa == null) {
            $khoa = new Khoa();
            $khoa->ma_khoa = $data[0];
            $khoa->ten_khoa = $data[1];
            $khoa->save();
            return "Đã Thêm";
        }else{
            return "Đã tồn tại";
        }
    }

    public function addChuyenNganh($data){
        $check_chuyen_nganh = ChuyenNganh::select('*')->where('ma_chuyen_nganh', $data[0])->first();
        if ($check_chuyen_nganh == null) {
            // check khóa ngoại
            $check_khoa = Khoa::select('*')->where('ma_khoa', $data[1])->first();
            if ($check_khoa != null) {
                $chuyen_nganh = new ChuyenNganh();
                $chuyen_nganh->ma_chuyen_nganh = "$data[0]";
                $chuyen_nganh->ma_khoa = "$data[1]";
                $chuyen_nganh->ten_chuyen_nganh = "$data[2]";
                $chuyen_nganh->save();
                return "Đã Thêm";
            }else{
                return "Lỗi khóa ngoại";
            }
        }else{
            return "Đã tồn tại";
        }
    }
}
