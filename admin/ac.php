<?php
$ac = isset($_GET["ac"])?$_GET["ac"]:"home";
	if($ac == "home")
	{
		include "index.php";
	}
	//Nhóm tin
	if($ac == "delnhomtin")
	{
		include "include/nhomtin/delnhomtin.php";
	}
	if($ac == "edit")
	{
		include "include/nhomtin/formsuanhomtin.php";
	}
	if($ac == "xledit")
	{
		include "include/nhomtin/xledit.php";
	}
		if($ac == "themnhomtin")
	{
		include "include/nhomtin/formthemnhomtin.php";
	}
	
	//Loại tin
	if($ac == "delloaitin")
	{
		include "include/loaitin/delloaitin.php";
	}
	if($ac == "editloai")
	{
		include "include/loaitin/formsualoaitin.php";
	}
	if($ac == "xleditloai")
	{
		include "include/loaitin/xleditloai.php";
	}
	if($ac == "themloaitin")
	{
		include "include/loaitin/formthemloaitin.php";
	}
	
	//Bài đăng
	if($ac == "delbaidang")
	{
		include "include/baidang/deltin.php";
	}
	if($ac == "xoabaidang")
	{
		include "include/baidang/xoatin.php";
	}
	if($ac == "thembaidang")
	{
		include "include/baidang/formthemtin.php";
	}
	if($ac == "editbaidang")
	{
		include "include/baidang/formsuatin.php";
	}
	if($ac == "xleditbaidang")
	{
		include "include/baidang/xledittin.php";
	}
	if($ac == "baidangchuaduyet")
	{
		include "include/baidang/baidangchuaduyet.php";
	}
	if($ac == "duyetbaidang")
	{
		include "include/baidang/duyetbaidang.php";
	}
	
	//Chức vụ
	if($ac == "delchucvu")
	{
		include "include/chucvu/delchucvu.php";
	}
	if($ac == "themchucvu")
	{
		include "include/chucvu/formthemchucvu.php";
	}
	if($ac == "editchucvu")
	{
		include "include/chucvu/formsuachucvu.php";
	}
	if($ac == "xleditchucvu")
	{
		include "include/chucvu/xleditchucvu.php";
	}
	
	//Thành viên
	if($ac == "deluser")
	{
		include "include/thanhvien/delthanhvien.php";
	}
	if($ac == "themuser")
	{
		include "include/thanhvien/formthemthanhvien.php";
	}
	if($ac == "xlthemuser")
	{
		include "include/thanhvien/xlthemthanhvien.php";
	}
	if($ac == "edituser")
	{
		include "include/thanhvien/formsuathanhvien.php";
	}
	if($ac == "xledituser")
	{
		include "include/thanhvien/xleditthanhvien.php";
	}
	
	
	//Phân quyền
	if($ac == "delquyen")
	{
		include "include/phanquyen/delquyen.php";
	}
	if($ac == "editquyen")
	{
		include "include/phanquyen/formsuaquyen.php";
	}
	if($ac == "xleditquyen")
	{
		include "include/phanquyen/xleditquyen.php";
	}
	//Bình luận
	if($ac == "delbinhluan")
	{
		include "include/binhluan/delbinhluan.php";
	}
	if($ac == "binhluanchuaduyet")
	{
		include "include/binhluan/binhluanchuaduyet.php";
	}
	if($ac == "duyetbinhluan")
	{
		include "include/binhluan/duyetbinhluan.php";
	}
	
	//Bài đăng
	if($ac == "thembai")
	{
		include "include/baidang/formthembai.php";
	}