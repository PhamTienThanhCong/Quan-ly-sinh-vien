-- create full database bán laptop
create table NhanVien
(
    maNV int identity primary key,
    tenNV nvarchar(50) not null,
    ngaySinh date not null,
    soDienThoai nvarchar(15) not null,
    diaChi nvarchar(100) not null,
    ngayVaoLam date not null,
    maCV int not null,
    constraint FK_NhanVien_ChucVu foreign key (maCV) references ChucVu(maCV)
)
create table ChucVu
(
    maCV int identity primary key,
    tenCV nvarchar(50) not null
)
create table KhachHang
(
    maKH int identity primary key,
    tenKH nvarchar(50) not null,
    soDienThoai nvarchar(15) not null,
    diaChi nvarchar(100) not null
)
create table NhaCungCap
(
    maNCC int identity primary key,
    tenNCC nvarchar(50) not null,
    soDienThoai nvarchar(15) not null,
    diaChi nvarchar(100) not null
)
create table LoaiSanPham
(
    maLoai int identity primary key,
    tenLoai nvarchar(50) not null
)
create table SanPham
(
    maSP int identity primary key,
    tenSP nvarchar(50) not null,
    soLuong int not null,
    donGia int not null,
    maLoai int not null,
    maNCC int not null,
    constraint FK_SanPham_LoaiSanPham foreign key (maLoai) references LoaiSanPham(maLoai),
    constraint FK_SanPham_NhaCungCap foreign key (maNCC) references NhaCungCap(maNCC)
)
create table HoaDon
(
    maHD int identity primary key,
    ngayLap date not null,
    maNV int not null,
    maKH int not null,
    constraint FK_HoaDon_NhanVien foreign key (maNV) references NhanVien(maNV),
    constraint FK_HoaDon_KhachHang foreign key (maKH) references KhachHang(maKH)
)
create table ChiTietHoaDon
(
    maHD int not null,
    maSP int not null,
    soLuong int not null,
    donGia int not null,
    constraint PK_ChiTietHoaDon primary key (maHD, maSP),
    constraint FK_ChiTietHoaDon_HoaDon foreign key (maHD) references HoaDon(maHD),
    constraint FK_ChiTietHoaDon_SanPham foreign key (maSP) references SanPham(maSP)
)
create table PhieuNhap
(
    maPN int identity primary key,
    ngayNhap date not null,
    maNV int not null,
    maNCC int not null,
    constraint FK_PhieuNhap_NhanVien foreign key (maNV) references NhanVien(maNV),
    constraint FK_PhieuNhap_NhaCungCap foreign key (maNCC) references NhaCungCap(maNCC)
)
create table ChiTietPhieuNhap
(
    maPN int not null,
    maSP int not null,
    soLuong int not null,
    donGia int not null,
    constraint PK_ChiTietPhieuNhap primary key (maPN, maSP),
    constraint FK_ChiTietPhieuNhap_PhieuNhap foreign key (maPN) references PhieuNhap(maPN),
    constraint FK_ChiTietPhieuNhap_SanPham foreign key (maSP) references SanPham(maSP)
)
-- Path: insert.sql