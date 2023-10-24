<?php




namespace App\Http\Controllers;

use App\Http\Requests\createNganhRequest;
use App\Models\ChuyenNganh;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChuyenNganhController extends Controller
{
    // Phương thức 'index' dùng để hiển thị danh sách chuyên ngành
    public function index()
    {
        $page = 'Quản Lý Chuyên Ngành';
        $chuyenNganhs = ChuyenNganh::select('chuyen_nganhs.*', 'khoas.ten_khoa', DB::raw('COUNT(sinh_viens.ma_chuyen_nganh) sinh_vien'))
            ->leftJoin('sinh_viens', 'sinh_viens.ma_chuyen_nganh', '=', 'chuyen_nganhs.ma_chuyen_nganh')
            ->join('khoas', 'chuyen_nganhs.ma_khoa', '=', 'khoas.ma_khoa')
            ->groupBy('chuyen_nganhs.ma_chuyen_nganh')
            ->get();

        return view('admin.chuyen_nganh.index', compact('chuyenNganhs', 'page'));
    }

    // Phương thức 'create' dùng để hiển thị form tạo mới chuyên ngành
    public function create()
    {
        $page = 'Thêm Chuyên Ngành';
        $khoas = Khoa::all(); // gán mọi thông tin có trong khoa
        return view('admin.chuyen_nganh.create', compact('page', 'khoas'));
    }

    // Phương thức 'store' dùng để lưu thông tin chuyên ngành mới
    public function store(createNganhRequest $request)
    {
        $chuyenNganh = new ChuyenNganh(); // taọ mới đối tượng chuyên ngành
        // upcase
        $chuyenNganh->ma_chuyen_nganh = strtoupper($request->ma_nganh); 
        $chuyenNganh->ten_chuyen_nganh = $request->ten_nganh;
        $chuyenNganh->ma_khoa = $request->ma_khoa;
        $chuyenNganh->save();
        return redirect()->route('admin.chuyen_nganh')->with('message', 'Thêm chuyên ngành mới thành công')->with('status', 'success');
    }

    // Phương thức 'edit' dùng để hiển thị form sửa thông tin chuyên ngành
    public function edit($id)
    {
        $page = 'Sửa Chuyên Ngành';
        $chuyenNganh = ChuyenNganh::find($id);
        $khoas = Khoa::all();
        return view('admin.chuyen_nganh.edit', compact('page', 'chuyenNganh', 'khoas'));
    }

    // Phương thức 'update' dùng để cập nhật thông tin chuyên ngành
    public function update(Request $request, $id)
    {
        $chuyenNganh = ChuyenNganh::where('ma_chuyen_nganh', $id)->first();
        $chuyenNganh->ten_chuyen_nganh = $request->ten_chuyen_nganh;
        $chuyenNganh->ma_khoa = $request->ma_khoa;
        $chuyenNganh->save();
        return redirect()->route('admin.chuyen_nganh')->with('message', 'Sửa chuyên ngành thành công')->with('status', 'success');
    }
}
