<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div  style="margin-top: 100px;"><?php
	$mauser = addslashes($_POST["Mauser"]);
	$matkhau = addslashes(md5($_POST['Matkhau']));
	$nhaplaimatkhau = addslashes(md5($_POST["Matkhau2"]));
	$hoten = addslashes($_POST["Hoten"]);
	$email = addslashes($_POST["Email"]);
	$gioitinh = addslashes($_POST["Gioitinh"]);



	// Kiểm tra 5 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
	if ( ! $matkhau || ! $nhaplaimatkhau || ! $email || ! $gioitinh || ! $hoten )
	{
			?>
			<script>
			alert("Xin vui lòng nhập đầy đủ các thông tin.");
			window.location="http://localhost/LVTN/admin/index2.php";
			</script>
			<?php
	
	}
	

	// Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
	if ( $matkhau != $nhaplaimatkhau )
	{
			?>
			<script>
			alert("Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu.");
			window.location="http://localhost/LVTN/admin/index2.php";
			</script>
			<?php
	}


	$a = new Db();
	$sql="update user set Matkhau=:Matkhau,Email=:Email,Hoten=:Hoten,Gioitinh=:Gioitinh where Mauser=:Mauser";
	
	$arr4 = array(":Matkhau"=>$matkhau,":Email"=>$email,":Hoten"=>$hoten,":Gioitinh"=>$gioitinh,":Mauser"=>$mauser);
	$q=$a->update($sql,$arr4);
	?>
		<script>
			alert("Sửa thông tin cá nhân thành công!");
			window.location="http://localhost/LVTN/admin/index2.php";
		</script>
	

</div>

</body>