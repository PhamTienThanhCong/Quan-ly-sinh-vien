<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // view subject
    public function viewSubject()
    {
        $page = "Danh sách chương trình học";
        $khoa = Auth::guard('student')->user()->ma_khoa;

        $mon_hocs = MonHoc::where('ma_khoa', $khoa)->orWhere('ma_khoa', null)
                    ->orderBy('ki_hoc', 'asc')
                    ->get();
        return view('student.subject.viewSubject', compact('page', 'mon_hocs'));
    }
}
