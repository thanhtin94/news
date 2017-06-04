<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="../../admin/images/register.ico">
  <title>Form Đăng ký</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../admin/assets/css/datepicker.css" rel="stylesheet" />
  <script src="../../admin/assets/js/jquery.min.js"></script>
  <script src="../../admin/assets/js/jquery-ui.js"></script>
  <script src="../../admin/assets/js/jquery.date.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
  <div class="lo-card">
    <h2>- Đăng Ký -</h2>
  <form action="xulydangky.php" method="post">
	
             <fieldset class="contain">

                    <input type="text" id="Tentaikhoan" name="Tentaikhoan" placeholder="Tên tài khoản">
              </fieldset>
              <fieldset class="contain">

                    <input type="password" id="Matkhau" name="Matkhau" placeholder="Mật khẩu">
              </fieldset>
              <fieldset class="contain">

                    <input type="password" id="Matkhau2" name="Matkhau2" placeholder="Nhập lại mật khẩu">
              </fieldset>
			  <fieldset class="contain">

                    <input type="text" id="Hoten" name="Hoten" placeholder="Họ và tên">
              </fieldset>
              <fieldset class="contain">

                    <input type="text" id="Email" name="Email" placeholder="Địa chỉ email">
              </fieldset>
              <fieldset class="contain">
					<label style="float:left;">Ngày sinh: </label>
                    <script>
                      $(function() {
                        $( "#Ngaysinh" ).datepicker();
                      });
                  </script>
				<input type="datetime" id="Ngaysinh" name="Ngaysinh" placeholder="Chọn ngày sinh">
              </fieldset>
              <fieldset class="contain">
              		<label style="float:left;">Giới tính: </label>
                    <select name="Gioitinh">
                                    <option value="0">Chọn giới tính</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Nam</option>
                     </select>
              </fieldset>
				<input type="submit" name="submit" class="lo lo-submit" style="margin-top:10px;" value="Đăng ký" >
		
	</form>
    <div class="login-help">
    • <a href="dangnhap.php">Quay trở lại đăng nhập</a> •
  </div>
</div>
<style>
.contain
	{ 
		padding:4px;
	}
</style>
<script src="../../admin/assets/js/jquery.min.js"></script>
<script src="../../admin/assets/js/bootstrap.min.js"></script>
<script src="../../admin/assets/js/bootstrap-datepicker.js"></script>
</body>
</html>
