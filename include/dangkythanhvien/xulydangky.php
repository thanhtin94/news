<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?php
include "../../config/config.php";
include "../../class/Db.class.php";
$Db = new Db();
?>
<div  style="margin-top: 100px;"><?php
	$tentaikhoan = addslashes($_POST["Tentaikhoan"]);
	$matkhau = addslashes(md5($_POST['Matkhau']));
	$nhaplaimatkhau = addslashes(md5($_POST["Matkhau2"]));
	$email = addslashes($_POST["Email"]);
	$gioitinh = addslashes($_POST["Gioitinh"]);
	$hoten = addslashes($_POST["Hoten"]);
	$machucvu = 0;
	$trangthai = 1;

	// Kiểm tra 6 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
	if ( ! $tentaikhoan || ! $matkhau || ! $nhaplaimatkhau || ! $email || ! $gioitinh || ! $hoten )
	{
			?>
			<script>
			alert("Xin vui lòng nhập đầy đủ các thông tin.");
			window.location="dangky.php";
			</script>
			<?php
	}
	
	$arr = $Db->select("select count(Tentaikhoan) as dem FROM user where Tentaikhoan ='$tentaikhoan'");
	
	if ( $arr[0]["dem"] > 0)
	{
			?>
			<script>
			alert("Tên đăng nhập này đã có người dùng, Bạn vui lòng chọn Tên đăng nhập khác.");
			window.location="dangky.php";
			</script>
			<?php
	}
	
	
	$arr2 = $Db->select("select count(Email) as dem FROM user where Email='$email'");
	if ( ($arr2[0]["dem"]> 0) && (check_email($email)))
	{
			?>
			<script>
			alert("Email không hợp lệ hoặc Email này đã có người dùng, Bạn vui lòng chọn Email khác.");
			window.location="dangky.php";
			</script>
			<?php
	}
	
	if ( $matkhau != $nhaplaimatkhau )
	{
			?>
			<script>
			alert("Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu");
			window.location="dangky.php";
			</script>
			<?php
	}


	$a = new Db();
	$sql="insert into user(Tentaikhoan,Matkhau,Email,Gioitinh,Hoten,Machucvu,Trangthai) values(:Tentaikhoan, :Matkhau, :Email, :Gioitinh, :Hoten, :Machucvu, :Trangthai) ";
	$arr=array(":Tentaikhoan"=>$tentaikhoan , ":Matkhau"=>$matkhau, ":Email"=>$email, ":Gioitinh"=>$gioitinh, ":Hoten"=>$hoten,":Machucvu"=>$machucvu,":Trangthai" =>$trangthai);
	$q=$a->insert($sql,$arr);
	?>
	<script>
		alert("Đăng ký thành công!!! Vui lòng đăng nhập lại!!!");
		window.location="dangnhap.php";
	</script>


</div>

</body>