
<html>
<head>
<title>Sửa Thông Tin </title>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

</head>
<body>
  <?php 
  
  $mu = $_GET["mauser"];
  $arr = $Db->select("select * from user where Mauser='$mu'")
   ?>
    <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Tài Khoản</h3>
     <hr width="50%">   
 <form action="index2.php?mod=xulysuathongtin2" method="post" class="comment-form">
            <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã user: </label>
                    <input type="hidden" name="Mauser" id="Mauser" value="<?php echo $arr[0]["Mauser"] ?>" />
                </fieldset>
            <fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên tài khoản: </label>
                    <input type="hidden" name="Tentaikhoan" id="Tentaikhoan" value="<?php echo $arr[0]["Tentaikhoan"] ?>" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã khẩu: </label>
                    <input type="password" name="Matkhau" id="Matkhau" placeholder="Mật Khẩu" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Nhập lại mật khẩu: </label>
                    <input type="password" id="Matkhau2" name="Matkhau2" placeholder="Nhập lại mật khẩu">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Họ và tên : </label>
                    <input type="text" id="Hoten" name="Hoten" value="<?php echo $arr[0]["Hoten"] ?>">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Email: </label>
                    <input type="text" id="Email" name="Email" value="<?php echo $arr[0]["Email"] ?>">
                </fieldset>
                <fieldset class="contain">
          <label class="col-sm-2 clabel">Ngày sinh: </label>
                    <script>
                      $(function() {
                        $( "#Ngaysinh" ).datepicker();
                      });
                  </script>
        <input type="datetime" id="Ngaysinh" name="Ngaysinh" placeholder="Chọn ngày sinh">
              </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Giới tính: </label>
                <select name="Gioitinh">
                                    <option value="0">Chọn Giới Tính</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Nam</option>
                </select>
                </fieldset>

                <label class="col-sm-2 clabel">
                  <input type="submit" class="khung sub" value="Hoàn tất"/>
                </label>
                </form>
  </form>
  </div>
 <script>
   function checkEmail(){
    $( "#Email" ).focusout(function() {
    if( $( "#Email" ).val().length == 0 ) {
      $( "#Email" ).addClass('newstyle').focus().val('');
      alert("Nhập sai email!");
    }
    else if( !isValidEmailAddress( $('#Email').val() ) ) {
      $( "#Email" ).addClass('newstyle').focus().val('');
      alert("Nhập sai email!");
    }
    })
  }
 </script>
</div>
</body>
</html>
