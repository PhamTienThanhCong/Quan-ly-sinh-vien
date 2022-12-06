<div class="sidebar" id="sidebar">
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            <li class="menu-title">
               <span>Phần của sinh viên</span>
            </li>

            <li class="{{ Request::routeIs('student.info.*') ? 'active' : '' }}">
               <a href="{{ route('student.info.index') }}"><i class="fa-solid fa-user-pen"></i><span> Thông tin cá nhân</span></a>
            </li>

            <li class="{{ Request::routeIs('student.viewSubject') ? 'active' : '' }}">
               <a href="{{ route('student.viewSubject') }}"><i class="fa-solid fa-rectangle-list"></i><span> Xem chương trình học</span></a>
            </li>

            <li class="{{ Request::routeIs('student.subjectRegister') ? 'active' : '' }}">
               <a href="{{ route('student.subjectRegister') }}"><i class="fa-solid fa-rectangle-list"></i><span> Đăng kí chương trình học</span></a>
            </li>

            <li class="submenu">
               <a href="#"><i class="fa-solid fa-calendar-day"></i> <span> Xem Lịch học - thi</span> <span class="menu-arrow"></span></a>
               <ul>
                  <li><a href="#">Xem lịch học</a></li>
                  <li><a href="#">Xem lịch thi </a></li>
               </ul>
            </li>
            <li class="submenu">
               <a href="#"><i class="fa-solid fa-file-contract"></i><span> Xem điểm</span> <span class="menu-arrow"></span></a>
               <ul>
                  <li><a href="#">Xem điểm học tập - thi</a></li>
                  <li><a href="#">Xem điểm điểm danh</a></li>
               </ul>
            </li>

            <li>
               <a href="{{ route('student.chat') }}"><i class="fa-solid fa-envelope-circle-check"></i> <span> Liên hệ góp ý</span></a>
            </li>
            
         </ul>
      </div>
   </div>
</div>