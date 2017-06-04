<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <?php
include "../../config/config.php";
include "../../class/Db.class.php";
$Db = new Db();
if(!isset($_SESSION))session_start();
	if(!isset($_SESSION))session_start();
	$username =  addslashes($_POST["Tentaikhoan"]);
	$password =  addslashes(md5($_POST["Matkhau"]));
	if(!$username || !$password)
	{
		?>
				<script> 
                alert("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu");
				window.location="dangnhap.php";
                </script>
		<?php
	}else{
			$arr = $Db->select("select Mauser, count(Tentaikhoan) as dem, Matkhau, Machucvu, Trangthai from user where Tentaikhoan = '$username'");
			if ($arr[0]["dem"] ==0) 
			{
				?>
				<script> 
                alert("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.");
				window.location="dangnhap.php";
                </script>
				<?php
			}
			else if($password != $arr[0]["Matkhau"])
			{
				?>
				<script>
                alert("Mật khẩu không đúng, vui lòng nhập lại.");
				window.location="dangnhap.php";
                </script>
				<?php
			}
			if ($arr[0]["Trangthai"] ==0) 
			{
				?>
				<script> 
                alert("Tài khoảng đã bị xóa hoặc không tồn tại.");
				window.location="dangnhap.php";
                </script>
				<?php
			}
			else
			{
				if($arr[0]["Machucvu"] == 1)
				{
					$_SESSION["tongbien"] = $arr[0];
				?>
						<script>
						alert("Đăng nhập thành công!");
						window.location="../../admin/index.php"
						</script>
					<?php
				}
				else if($arr[0]["Machucvu"] == 2)
				{
					$_SESSION["quantri"] = $arr[0];
				?>
						<script>
						alert("Đăng nhập thành công!");
						window.location="../../admin/index2.php"
						</script>
					<?php
				}
				else if($arr[0]["Machucvu"] == 3)
				{
					$_SESSION["tacgia"] = $arr[0];
				?>
						<script>
						alert("Đăng nhập thành công!");
						window.location="../../admin/index3.php"
						</script>
					<?php
				}
				else {
					$_SESSION["user"] = $arr[0];
					?>
					<script>
					alert("Tài khoản của bạn chưa được duyệt quyền!");
					window.location="dangnhap.php";
					</script>
					<?php
				}
		}
	}
?> 
  