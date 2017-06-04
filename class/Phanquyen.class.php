<?php

	class PhanQuyen extends Db
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
			
			$sql = "select * from user, chucvu where user.Machucvu = chucvu.Machucvu and Ttlamviec = '1' Order BY Mauser DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
            <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Phân Quyền Thành Viên</h3>
            <hr width="50%">
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								   <th class="col-sm-2">Mã user</th>
								   <th class="col-sm-3">Tên tài khoản</th>
								   <th class="col-sm-4">Họ và tên</th>
								   <th class="col-sm-3">Chức vụ</th>
                                    <th class="col-sm-3">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-2"><?php echo $s["Mauser"]?></td>
									<td class="col-sm-3"><?php echo $s["Tentaikhoan"];?></td>
									<td class="col-sm-4"><?php echo $s["Hoten"];?></td>
									<td class="col-sm-3"><?php echo $s["Tenchucvu"];?></td>

								   <td class="col-sm-3">
									 <a href="../admin/index.php?mod=thaotac&ac=editquyen&maquyen=<?php echo $s["Mauser"];?>" style="color:#666; margin-right:20px;" title="Edit"><i class="fa fa-edit"></i>
                                         </a>
										<a href="../admin/index.php?mod=thaotac&ac=delquyen&maquyen=<?php echo $s["Mauser"];?>"style="color:#000" title="Delete" class="xoa">
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
											if( window.confirm("Bạn có chắc chắn muốn xóa quyền của user này không?")){ 
												window.location = $(this).data('href');
											return true; 
											}else{ 
											return false ;
											}
										})
										</script>
						<div style="color:#F00; clear:both; text-align:center;">
							<?php
								for($i=1; $i<= $sotrang; $i++)
								{
									?>
									<a class="a" href="index.php?mod=danhsachphanquyen&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
									<?php	
								}
							?>
						</div>

					</div> <!-- End #tab1 -->

				
				</div> <!-- End .content-box-content -->
			<?php
		}
		
		public function xoaquyen()
		{
			$idquyen= $_GET["maquyen"];
			$a = new Db();
			$sql ="update user set Machucvu ='0' where Mauser ='$idquyen'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			 <script language="javascript">
			alert("Đã xóa quyền của 1 user");
		    window.location="index.php?mod=danhsachphanquyen";
		    </script>
		    <?php
		}
		// hàm sửa 
		public function formEdit()
		{
			$mq=$_GET["maquyen"];
			$sql = "select * from user where Mauser='$mq' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
            <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Thêm Quyền</h3>
            <hr width="50%">  
			<form action="index.php?mod=thaotac&ac=xleditquyen" method="post" class="comment-form" >
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã User: </label><?php echo $mq; ?>
                    <input type="hidden" name="id" value="<?php echo $s["Mauser"]; ?>" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên Tài Khoản: </label>
                    <?php echo $s["Tentaikhoan"]; ?>
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Họ Và Tên: </label>
                    <?php echo $s["Hoten"]; ?>
                </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Chức Vụ: </label>
                    <select name="idchucvu">
                    <option value="all">Chọn Tên Chức Vụ</option>
                 	<?php 
					$sql = "select Machucvu, Tenchucvu from chucvu";
					$show = $this->select($sql);
								foreach($show as $s1)
									{
									?>
			                 	    <option value="<?php echo $s1["Machucvu"] ?>"><?php echo $s1["Tenchucvu"]?>
			                 		<?php
				                   	}
				                    ?>
			        </option>
                	</select>
                </fieldset>
                <label class="col-sm-2 clabel">
                	<input type="submit" class="khung sub" value="Thêm"/>
                </label>
                </form>
  
			<?php
			}

		}

		// hàm xử lý sửa
		public function Edit()
		{
			$id = $_POST["id"];
			$idchuc = $_POST["idchucvu"];

			$a = new Db();
			$sql="update user set Machucvu ='$idchuc'  where  Mauser ='$id'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			<script >
			alert("Đã duyệt quyền cho 1 user.");
			window.location="index.php?mod=danhsachphanquyen";
			</script>
			<?php
		}
	}

?>