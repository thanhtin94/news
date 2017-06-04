<?php
class ThanhVien extends Db
	{

public function show()
		{
			$sqldem = "select count(*) as dem from user";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 10;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;
			$sql = "select * from user, chucvu where user.Machucvu = chucvu.Machucvu Order BY Mauser DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
            <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Thành Viên</h3>
            <hr width="50%">
               <div style="margin-bottom:5px;"> 
                <div style="float:left;">
                    <a href="../admin/index.php?mod=thaotac&ac=themuser" style="margin-right: 20px; color:#333; font-weight:bold;" title="Add">
                    <img src="../admin/images/icon/plus.png" width="30px" height="30px" alt="Add" />Thêm thành viên</a>
                  </div>
                  <div style="float:right;">
                   	<form action="../admin/index.php?mod=xltimkiemthanhvien" method="post">
						<input type="search" name="search" id="search" placeholder="Tìm kiếm">
           			</form>
                  </div>
              	</div>
					<div class="tab-content default-tab" id="tab1" style="clear:both;">
						<table>
							<thead>
								<tr>					   	
								   	<th class="col-sm-1">Tên Tài Khoản</th>
                                    <th class="col-sm-1">Họ và Tên</th>
								   	<th class="col-sm-1">Email</th>
								   	<th class="col-sm-1">Ngày Sinh</th>
								   	<th class="col-sm-1">Giới Tính</th>
								   	<th class="col-sm-1">Chức Vụ</th>
								   	<th class="col-sm-1">Hiện Trạng</th>
                                    <th class="col-sm-1">Tình Trạng</th>
                                    <th class="col-sm-1">Thao Tác</th>
								</tr>
							</thead>

							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
                                	<td class="col-sm-1"><?php echo $s["Tentaikhoan"]?></td>
									<td class="col-sm-1"><?php echo $s["Hoten"]?></td>
									<td class="col-sm-1"><?php echo $s["Email"];?></td>
									<td class="col-sm-1"><?php echo $s["Ngaysinh"];?></td>
									<td class="col-sm-1"><?php 
										if($s["Gioitinh"]=2)
											echo "Nam";
										else 
											echo "Nữ";

									?></td>
									<td class="col-sm-1"><?php echo $s["Tenchucvu"] ?></td>
									<td class="col-sm-1"><?php 
										if($s["Ttlamviec"]== 1)
											echo "Đang làm việc";
										else  
											echo "Đã nghỉ việc";

									?></td>	
                                    <td class="col-sm-1"><?php 
										if($s["Trangthai"]== 1)
											echo "Đang hoạt động";
										else  
											echo "Đã xóa/khóa";

									?></td>							
									<td class="col-sm-1">
                                     <a href="../admin/index.php?mod=thaotac&ac=edituser&mauser=<?php echo $s["Mauser"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-edit"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=deluser&mauser=<?php echo $s["Mauser"];?>"style="color:#000" title="Delete" class="xoa" >
                                          <i class="fa fa-close"></i></a> 
									</td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table>
						<script language="javascript"> 
											$('.xoa').click(function() {
											if( window.confirm("Bạn có chắc chắn muốn xóa không?")){ 
												window.location = $(this).data('href');
											return true; 
											}else{ 
											return false ;
											}
										})
										</script>
					</div>
                    <div style="color:#F00; clear:both; text-align:center;">
							<?php
								for($i=1; $i<= $sotrang; $i++)
								{
									?>
									<a class="a" href="index.php?mod=danhsachthanhvien&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
									<?php	
								}
							?>
						</div>
				</div>
			<?php
		}
		public function remove() {
			$mauser=$_GET["mauser"];
			$a = new Db();
			$sql ="update user set Trangthai='0', Ttlamviec = '0' where Mauser ='$mauser'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			<script >
			alert("đã xóa 1 thành viên!!!");
			window.location="index.php?mod=danhsachthanhvien";
			</script>
			<?php 
		}

		public function xltimkiemthanhvien()
		{ 
		$tk = $_POST["search"];
		$sql = "select * from user where tentaikhoan like '%$tk%' or Hoten like'%$tk%'" ;
		$show = $this->select($sql);
			if(count($show) > 0)
			{
			?>
			<h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Từ Khóa "<?php echo $tk ?>"</h3>
            <hr width="50%">
			<div class="tab-content default-tab" id="tab1">
							<table>
								<thead>
									<tr>
									   	<th class="col-sm-1">Tên Tài Khoản</th>
                                        <th class="col-sm-1">Họ Và Tên</th>
									   	<th class="col-sm-1">Email</th>
									   	<th class="col-sm-1">Ngày Sinh</th>
									   	<th class="col-sm-1">Giới Tính</th>
									   	<th class="col-sm-1">Hiện Trạng</th>
									   	<th class="col-sm-1">Tình Trạng</th>
									</tr>
								</thead>
								<tbody>
	                            <?php 
								foreach($show as $s)
								{
									?>
									<tr>
                                	<td class="col-sm-1"><?php echo $s["Tentaikhoan"]?></td>
									<td class="col-sm-1"><?php echo $s["Hoten"]?></td>
									<td class="col-sm-1"><?php echo $s["Email"];?></td>
									<td class="col-sm-1"><?php echo $s["Ngaysinh"];?></td>
									<td class="col-sm-1"><?php 
										if($s["Gioitinh"]=-2)
											echo "Nam";
										else 
											echo "Nữ";
									?>
                                    </td>
                                    <td class="col-sm-1"><?php 
										if($s["Ttlamviec"]== 1)
											echo "Đang làm việc";
										else  
											echo "Đã nghỉ việc";

									?></td>	
                                    <td class="col-sm-1"><?php 
										if($s["Trangthai"]== 1)
											echo "Đang hoạt động";
										else  
											echo "Đã xóa/khóa";

									?></td>							
								</tr>
								<?php
								}
								?>	
								</tbody>
							</table>
			</div> 
			<?php
			}
			else {
				?>
				<script type="text/javascript">
					alert("Không Tìm Thấy");
					window.location="index.php?mod=danhsachthanhvien";
				</script>
				<?php
				}
			}
			public function formEdit()
			{
			$mu=$_GET["mauser"];
			$sql = "select * from user where Mauser='$mu' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
			<h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Thành Viên</h3>
            <hr width="50%">  
            <form action="index.php?mod=thaotac&ac=xledituser" method="post" class="comment-form">
       			<fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã user: </label>
                    <input type="hidden" name="Mauser" id="Mauser" value="<?php echo $s["Mauser"] ?>" />
                </fieldset>
        		<fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên tài khoản: </label>
                    <input type="hidden" name="Tentaikhoan" id="Tentaikhoan" value="<?php echo $s["Tentaikhoan"] ?>" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mật khẩu: </label>
                    <input type="password" name="Matkhau" id="Matkhau" placeholder="Mật Khẩu" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Nhập lại mật khẩu: </label>
                    <input type="password" name="Matkhau2" id="Matkhau2" placeholder="Nhập Lại Mật Khẩu" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Họ và tên : </label>
                    <input type="text" id="Hoten" name="Hoten" value="<?php echo $s["Hoten"] ?>">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Email: </label>
                    <input type="text" id="Email" name="Email" value="<?php echo $s["Email"] ?>">
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
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Hiện trạng: </label>
                <select name="Ttlamviec">
                                    <option value="0">Đã nghỉ việc</option>
                                    <option value="1">Đang làm việc</option>
                </select>
                </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Trạng thái: </label>
                <select name="Trangthai">
                                    <option value="0">Đã xóa/khóa</option>
                                    <option value="1">Đang hoạt động</option>
                </select>
                </fieldset>
                <label class="col-sm-2 clabel">
                	<input type="submit" class="khung sub" value="Hoàn tất"/>
                </label>
                </form>
		</form>

			<?php
			}

		}


		// hàm xử lý sửa
		public function Edit()
		{
			$Db = new Db();
			$id = addslashes($_POST["Mauser"]);
			$tentaikhoan = addslashes($_POST["Tentaikhoan"]);
			$matkhau = addslashes(md5($_POST['Matkhau']));
			$nhaplaimatkhau = addslashes(md5($_POST["Matkhau2"]));
			$email = addslashes($_POST["Email"]);
			$gioitinh = addslashes($_POST["Gioitinh"]);
			$ngaysinh = addslashes($_POST["Ngaysinh"]);
			$hoten = addslashes($_POST["Hoten"]);
			$ttlamviec = addslashes($_POST["Ttlamviec"]);
			$trangthai =  addslashes($_POST["Trangthai"]);

			// Kiểm tra 6 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
			if ( ! $matkhau || ! $nhaplaimatkhau || ! $email || ! $gioitinh || ! $hoten )
			{
					?>
					<script>
					alert("Xin vui lòng nhập đầy đủ các thông tin.");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}

			if ( $matkhau != $nhaplaimatkhau )
			{
					?>
					<script>
					alert("Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}
			$a = new Db();
			$sql="update user set Matkhau='$matkhau',Hoten='$hoten', Email='$email', Ngaysinh = '$ngaysinh', Gioitinh = '$gioitinh', Ttlamviec='$ttlamviec', Trangthai='$trangthai' where  Mauser='$id'  ";
			$arr=array( ":Matkhau"=>$matkhau,":Hoten"=>$hoten, ":Email"=>$email, ":Ngaysinh"=>$ngaysinh,":Gioitinh"=>$gioitinh, ":Ttlamviec"=>$ttlamviec, ":Trangthai"=>$trangthai, ":Mauser" =>$id);
			$q=$a->update($sql,$arr);
			?>
					<script >
					alert("Đã sửa một thành viên trong danh sách.");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
			<?php
		}

		public function formthemthanhvien()
		{
		?>
		 <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Thành Viên</h3>
            <hr width="50%">
		<form action="index.php?mod=thaotac&ac=xlthemuser" method="post" class="comment-form">
        		<fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên tài khoản: </label>
                    <input type="text" name="Tentaikhoan" id="Tentaikhoan" placeholder="Tên Tài Khoản"  />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mật khẩu: </label>
                    <input type="password" name="Matkhau" id="Matkhau" placeholder="Mật Khẩu" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Nhập lại mật khẩu: </label>
                    <input type="password" name="Matkhau2" id="Matkhau2" placeholder=" Nhập Lại Mật Khẩu" />
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Họ và tên : </label>
                    <input type="text" id="Hoten" name="Hoten" placeholder="Họ và Tên" ">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Email: </label>
                    <input type="text" id="Email" name="Email" placeholder="Email" >
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
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Hiện trạng: </label>
                <select name="Ttlamviec">
                                    <option value="0">Đã nghỉ việc</option>
                                    <option value="1">Đang làm việc</option>
                </select>
                </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Trạng thái: </label>
                <select name="Trangthai">
                                    <option value="0">Đã xóa/khóa</option>
                                    <option value="1">Đang hoạt động</option>
                </select>
                </fieldset>
                <label class="col-sm-2 clabel">
                	<input type="submit" class="khung sub" value="Thêm"/>
                </label>
                </form>
			</form>
			<style type="text/css">
			  .form-module input.newstyle:focus {
			    border: 1px solid red;
				  }
				  
				  .Gioitinh {
				    width: 17%;
				    height: 42px;
				    padding-left: 10px;
				    border: 1px solid #d9d9d9;
				    color: #afafaf;
				  }
			</style>
		<?php
	}
		public function xlthemthanhvien()
		{
			$Db = new Db();
			$tentaikhoan = addslashes($_POST["Tentaikhoan"]);
			$matkhau = addslashes(md5($_POST['Matkhau']));
			$nhaplaimatkhau = addslashes(md5($_POST["Matkhau2"]));
			$email = addslashes($_POST["Email"]);
			$gioitinh = addslashes($_POST["Gioitinh"]);
			$ngaysinh = addslashes($_POST["Ngaysinh"]);
			$hoten = addslashes($_POST["Hoten"]);
			$ttlamviec = addslashes($_POST["Ttlamviec"]);
			$trangthai =  addslashes($_POST["Trangthai"]);
			$machucvu = 0;

			// Kiểm tra 6 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
			if ( ! $tentaikhoan || ! $matkhau || ! $nhaplaimatkhau || ! $email || ! $gioitinh || ! $hoten )
			{
					?>
					<script>
					alert("Xin vui lòng nhập đầy đủ các thông tin.");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}
			$arr = $Db->select("select count(Tentaikhoan) as dem FROM user where Tentaikhoan ='$tentaikhoan'");
			
			if ( $arr[0]["dem"] > 0)
			{
					?>
					<script>
					alert("Tên đăng nhập này đã có người dùng, Bạn vui lòng chọn Tên đăng nhập khác.");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}
			$arr2 = $Db->select("select count(Email) as dem FROM user where Email='$email'");
			if ( ($arr2[0]["dem"]> 0) && (check_email($email)))
			{
					?>
					<script>
					alert("Email không hợp lệ hoặc Email này đã có người dùng, Bạn vui lòng chọn Email khác.");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}
			if ( $matkhau != $nhaplaimatkhau )
			{
					?>
					<script>
					alert("Mật khẩu không giống nhau, bạn hãy nhập lại mật khẩu");
					window.location="index.php?mod=danhsachthanhvien";
					</script>
					<?php
			}
			$a = new Db();
			$sql="insert into user(Tentaikhoan,Matkhau,Hoten,Email,Ngaysinh,Gioitinh,Ttlamviec,Machucvu,Trangthai) values(:Tentaikhoan,  :Matkhau,:Hoten, :Email, :Ngaysinh, :Gioitinh, :Ttlamviec,:Machucvu, :trangthai) ";
			$arr=array(":Tentaikhoan"=>$tentaikhoan ,":Matkhau"=>$matkhau, ":Hoten"=>$hoten, ":Email"=>$email, ":Ngaysinh"=>$ngaysinh, ":Gioitinh"=>$gioitinh, ":Ttlamviec"=>$ttlamviec, ":Machucvu"=>$machucvu, "trangthai"=>$trangthai );
			$q=$a->insert($sql,$arr);
				?>

					<script>
						alert("Thêm 1 thành viên thành công!");
						window.location="index.php?mod=danhsachthanhvien";
					</script>

				<?php

				}
				
	}
	
?>