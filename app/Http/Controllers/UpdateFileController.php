<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\ChuyenNganh;
use App\Models\Khoa;
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
        }
        return view('admin.upload.updatefile', compact('page', 'table'));
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
                }
            }

            $page = "Kết quả sau khi thêm";

            return view('admin.upload.result', compact('data', 'table', 'page'))->with('message', 'Thêm thành công')->with('status', 'Đã thêm thành công');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return redirect()->back()->with('failures', $failures);
        }
    }
}
