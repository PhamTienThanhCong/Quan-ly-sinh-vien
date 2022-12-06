<div class="header">
    <div class="header-left">
       <a href="#" class="logo">
       <img src="{{ asset('/assets/img/logo.png') }}" alt="Logo">
       </a>
       <a href="#" class="logo logo-small">
       <img src="{{ asset('/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
       </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
    <i class="fas fa-align-left"></i>
    </a>
    <div class="top-nav-search">
       <form>
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
       </form>
    </div>
    <a class="mobile_btn" id="mobile_btn">
    <i class="fas fa-bars"></i>
    </a>
    <ul class="nav user-menu">
       <li class="nav-item dropdown noti-dropdown">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
          <i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
          </a>
          <div class="dropdown-menu notifications">
             <div class="topnav-dropdown-header">
                <span class="notification-title">Thông báo</span>
                <a href="javascript:void(0)" class="clear-noti"> Xóa tất cả </a>
             </div>
             <div class="noti-content">
                <ul class="notification-list">
                   <!-- no thing notification -->
                </ul>
             </div>
             <div class="topnav-dropdown-footer">
                <a href="#">Xem tất cả thông báo</a>
             </div>
          </div>
       </li>
       <li class="nav-item dropdown has-arrow">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
          <span class="user-img"><img class="rounded-circle" src="{{ asset('/assets/img/profiles/avatar.jpg') }}" width="31" alt="{{ Auth::guard('admin')->user()->username }}"></span>
          </a>
          <div class="dropdown-menu">
             <div class="user-header">
                <div class="avatar avatar-sm">
                   <img src="{{ asset('/assets/img/profiles/avatar.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                </div>
                <div class="user-text">
                   <h6>{{ Auth::guard('admin')->user()->username }}</h6>
                   <p class="text-muted mb-0">Giáo vụ</p>
                </div>
             </div>
             <!-- <a class="dropdown-item" href="profile.html">My Profile</a> -->
             <a class="dropdown-item" href="{{ route('admin.chat') }}">Liên lạc</a>
             <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
          </div>
       </li>
    </ul>
 </div>