<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Phần của giáo vụ</span>
                </li>
                <li class="{{ Request::routeIs('admin.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="fa-solid fa-user-pen"></i><span> Tổng quan </span></a>
                </li>
                <li class="{{ request()->is('quan-tri-vien/khoa-khoa*') ? 'submenu active' : 'submenu' }}">
                    <!-- <i class="fa-regular fa-school-lock"></i> -->
                    <a href="#"
                        class="{{ request()->is('quan-tri-vien/khoa-khoa*') ? 'submenu active' : '' }}"><i
                            class="fa fa-graduation-cap"></i> <span> Quản lý khoa - khóa</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ request()->is('quan-tri-vien/khoa-khoa/quan-ly-khoa*') ? 'active' : '' }}" href="{{ route('admin.danh_sach_khoa') }}">Quản lý về khoa</a></li>
                        <li><a class="{{ Request::routeIs('admin.chuyen_nganh.*') ? 'active' : '' }}{{ Request::routeIs('admin.chuyen_nganh') ? 'active' : '' }}" href="{{ route('admin.chuyen_nganh') }}">Quản lý Ngành học</a></li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('admin.sinh_vien.*') ? 'submenu active' : 'submenu' }}">
                    <a class="{{ Request::routeIs('admin.sinh_vien.*') ? 'submenu active' : '' }}" href="#"><i class="fas fa-user-graduate"></i> <span> Quản lý Sinh Viên</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeIs('admin.sinh_vien.khoa_moi.*') ? 'active' : '' }}{{ Request::routeIs('admin.sinh_vien.khoa_moi') ? 'active' : '' }}" href="{{ route('admin.sinh_vien.khoa_moi') }}">Danh sách sinh khóa mới viên</a></li>
                        <li><a class="{{ Request::routeIs('admin.sinh_vien.khoa.*') ? 'active' : '' }}{{ Request::routeIs('admin.sinh_vien.khoa') ? 'active' : '' }}" href="{{ route('admin.sinh_vien.khoa',"all") }}">Danh sách sinh viên</a></li>

                        <li><a href="./sv_moi.html">Sinh viên đã tốt nghiệp</a></li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('admin.giang_vien.*') ? 'active' : '' }}">
                    <a href="{{ route("admin.giang_vien.index") }}">
                        <i class="fa fa-chalkboard-user"></i>
                        <span> Quản lý giảng viên</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('admin.mon_hoc.*') ? 'submenu active' : 'submenu' }}">
                    <a href="#"><i class="fa-solid fa-pen-to-square"></i><span> Quản lý môn học</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeIs('admin.mon_hoc.index') ? 'active' : '' }}" href="{{ route('admin.mon_hoc.index') }}">Danh sách môn học</a></li>
                        <li><a class="{{ Request::routeIs('admin.mon_hoc.create') ? 'active' : '' }}" href="{{ route('admin.mon_hoc.create') }}">Thêm môn học</a></li>
                    </ul>
                </li>

                <li class="{{ Request::routeIs('admin.ki_hoc.*') ? 'submenu active' : 'submenu' }}">
                    <a href="#"><i class="fa-solid fa-pen-to-square"></i><span> Quản lý Học tập</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::routeIs('admin.ki_hoc.*') ? 'active' : '' }}" href="{{ route("admin.ki_hoc.index") }}">Quản lý lịch đăng kí tín chỉ</a></li>
                        {{-- <li><a href="./lich_day.html">Quản lý lịch dạy </a></li>
                        <li><a href="./lich_thi.html">Quản lý lịch thi</a></li> --}}
                        {{-- <li><a href="{{ route('admin.ki_hoc.view_class') }}">Quản lý điểm</a></li> --}}
                    </ul>
                </li>

                <li  class="{{ Request::routeIs('admin.chat') ? 'active' : '' }}">
                    <a href="{{ route('admin.chat') }}">
                        <i class="fa-solid fa-envelope-circle-check"></i> 
                        <span> Công tác liên hệ</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
