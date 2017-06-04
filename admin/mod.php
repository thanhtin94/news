<?php
	$mod = isset($_GET["mod"])?$_GET["mod"]:"home";
	if($mod == "home")
	{

	}
		if($mod == "thaotac")
	{
		include "ac.php";
	}
	//Nhóm tin
	if($mod == "danhsachnhomtin")
	{
		include "include/nhomtin/danhsachnhomtin.php";
	}
	if($mod == "xlthemnhomtin")
	{
		include "include/nhomtin/xlthem.php";
	}

	//Loại tin
	if($mod == "danhsachloaitin")
	{
		include "include/loaitin/danhsachloaitin.php";
	}
	if($mod == "xlthemloaitin")
	{
		include "include/loaitin/xlthemloai.php";
	}
	//Chức vụ
	if($mod == "danhsachchucvu")
	{
		include "include/chucvu/danhsachchucvu.php";
	}
	if($mod == "xlthemchucvu")
	{
		include "include/chucvu/xlthemchucvu.php";
	}
	
	//Bài đăng
	if($mod == "danhsachbaidang")
	{
		include "include/baidang/danhsachbaidang.php";
	}
	if($mod == "xlthembaidang")
	{
		include "include/baidang/xlthemtin.php";
	}
	if($mod == "xltimkiemtin")
	{
		include "include/baidang/xltimkiemtin.php";
	}
	
	//Thành viên
	if($mod == "danhsachthanhvien")
	{
		include "include/thanhvien/danhsachthanhvien.php";
	}
	if($mod == "xltimkiemthanhvien")
	{
		include "include/thanhvien/xltimkiemthanhvien.php";
	}
	
	//Thông tin
	if($mod == "suathongtin")
	{
		include "../include/dangkythanhvien/suathongtin.php";
	}
	if($mod == "suathongtin2")
	{
		include "../include/dangkythanhvien/suathongtin2.php";
	}
	if($mod == "suathongtin3")
	{
		include "../include/dangkythanhvien/suathongtin3.php";
	}
	if($mod == "xulysuathongtin")
	{
		include "../include/dangkythanhvien/xulysuathongtin.php";
	}
	if($mod == "xulysuathongtin2")
	{
		include "../include/dangkythanhvien/xulysuathongtin2.php";
	}
	if($mod == "xulysuathongtin3")
	{
		include "../include/dangkythanhvien/xulysuathongtin3.php";
	}
	if($mod == "xemthongtin")
	{
		include "../include/dangkythanhvien/xemthongtin.php";
	}
	
	//Phân quyền
	if($mod == "danhsachphanquyen")
	{
		include "include/phanquyen/danhsachphanquyen.php";
	}

	//Bình luận
	if($mod == "danhsachbinhluan")
	{
		include "include/binhluan/danhsachbinhluan.php";
	}
	
	//Đăng bài
		if($mod == "xlthembai")
	{
		include "include/baidang/xlthembai.php";
	}