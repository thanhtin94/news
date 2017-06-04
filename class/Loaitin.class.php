<?php
	class LoaiTin extends Db
	{	
		// hàm hiển thị
		public function show()
		{
			$sqldem = "select count(*) as dem from Loaitin";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 20;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;

			$sql = "select * from Loaitin ORDER BY Maloaitin DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
            <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Loại Tin</h3>
            <hr width="50%"> 
             <a href="../admin/index.php?mod=thaotac&ac=themloaitin" style="margin-right: 20px; color:#333; font-weight:bold;" title="Add">
				<img src="../admin/images/icon/plus.png" width="30px" height="30px" alt="Add" />Thêm loại tin</a>
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								    <th class="col-sm-2">Mã Loại Tin</th>
                                    <th class="col-sm-2">Mã Nhóm Tin</th>
								    <th class="col-sm-6">Tên Nhóm Tin</th>
								    <th class="col-sm-2">Trạng Thái</th>
                                    <th class="col-sm-2">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-2"><?php echo $s["Maloaitin"]?></td>
                                    <td class="col-sm-2"><?php echo $s["Manhomtin"]?></td>
									<td class="col-sm-6"><?php echo $s["Tenloaitin"];?></td>
									<td class="col-sm-2"><?php echo $s["Trangthai"];?></td>								
									<td class="col-sm-2">
										<!-- Icons -->
										 <a href="../admin/index.php?mod=thaotac&ac=editloai&maloai=<?php echo $s["Maloaitin"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-edit"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=delloaitin&maloai=<?php echo $s["Maloaitin"];?>"style="color:#000" title="Delete" class="xoa" >
                                          <i class="fa fa-close"></i></a> 
									
									</td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table>
										<script language="javascript"> 
											$(".xoa").click(function() {
											if( window.confirm("Bạn có chắc chắn muốn xóa không?")){ 
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
									<a class="a" href="index.php?mod=danhsachloaitin&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
									<?php	
								}
							?>
						</div>
					
				</div> 
			<?php
		}
		// hàm xóa
		public function remove()
		{
			$ml =$_GET["maloai"];
			$a = new Db();
			$sql="delete from loaitin where Maloaitin ='$ml' ";
			$arr=array("'$ml'");
			$q=$a->delete($sql,$arr);
			if ($q==0) $thongbao="Lỗi xóa ";
				else $thongbao ="xoa $q loại tin ";
			?>
			<script>
			alert("Đã xóa một loại tin trong danh sách.");
			window.location="index.php?mod=danhsachloaitin";
			</script>
			<?php
		}
		// hàm sửa 
		public function formEdit()
		{
			$ml=$_GET["maloai"];
			$sql = "select * from loaitin where Maloaitin='$ml' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
            <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Loại Tin</h3>
            <hr width="50%">  
			<form action="index.php?mod=thaotac&ac=xleditloai" method="post" class="comment-form">
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã Loai Tin: </label><?php echo $ml; ?>
                    <input type="hidden" name="id" value="<?php echo $s["Maloaitin"]; ?>" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên Loại Tin</label>
                    <input type="text" id="tenloai" name="name" value="<?php echo $s["Tenloaitin"]; ?>" size="32" aria-required="true" >
                </fieldset>
                 <fieldset class="contain">
                <label class="col-sm-2 clabel">Trạng Thái: </label><select name="status" value="<?php echo $s["Trangthai"]; ?>" class="trangthai">
                 	<option value="0">0</option>
                 	<option value="1">1</option>
                </select>
                </fieldset>
                 <fieldset class="contain">
                 <label class="col-sm-2 clabel">Mã Nhóm Tin: </label>
                    <select name="idnhom">
                    <option value="all">Chọn Tên Nhóm Tin</option>
					<?php 
					$sql = "select Manhomtin, Tennhomtin from nhomtin";
					$show = $this->select($sql);
								foreach($show as $s1)
									{
									?>
			                 	    <option value="<?php echo $s1["Manhomtin"] ?>"><?php echo $s1["Tennhomtin"]?>
			                 		<?php
				                   	}
				                    ?>
			                 	</option>
                	</select>
                </fieldset>
               

                <label class="col-sm-2 clabel">
                	<input type="submit" class="khung sub" value="Sửa"/>
                </label>
                </form>

			<?php
			}

		}

		// hàm xử lý sửa
		public function Edit()
		{
			$id = $_POST["id"];
			$idnhom = $_POST["idnhom"];
			$name = $_POST["name"];
			$st = $_POST["status"];

			$a = new Db();
			$sql="update loaitin set Tenloaitin='$name', Manhomtin = '$idnhom', Trangthai='$st'  where  Maloaitin='$id'  ";
			$arr=array();
			$q=$a->update($sql,$arr);

			?>


			<script >
			alert("Đã sửa một loại tin trong danh sách.");
			window.location="index.php?mod=danhsachloaitin";
			</script>
			<?php
		}
		// hàm nhập liệu thêm
		public function formAdd()
		{
			
			?>
            <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Loại Tin</h3>
            <hr width="50%">  
            <form action="index.php?mod=xlthemloaitin" method="post" class="comment-form">
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Loại Tin: </label>
                    <input type="text" id="maloai" class="tb-my-input" name="idloaitin" placeholder="Mã Loại Tin" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
				<label class="col-sm-2 clabel">Mã Nhóm Tin: </label>
                    <select name="idnhomtin">
                    <option value="all">Chọn Tên Nhóm Tin</option>
					<?php 
					$sql = "select Manhomtin, Tennhomtin from nhomtin ";
								$show = $this->select($sql);
					foreach($show as $s)
						{
						?>
                 	<option value="<?php echo $s["Manhomtin"] ?>"><?php echo $s["Tennhomtin"]?>
                 		<?php
	                   	}
	                    ?>
                 	</option>
                	</select>
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tên Loại Tin: </label>
                    <input type="text" id="tenloai" class="tb-my-input" name="nameloaitin" placeholder="Tên Loại Tin" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Trạng Thái: </label><select name="status" class="trangthai">
                 	<option value="0">0</option>
                 	<option value="1">1</option>
                	</select>
                </fieldset>

               	<label class="col-sm-2 clabel">
                	<input type="submit" class="sub" value="Thêm"/>
                </label>
                </form>
            <?php 
		}

		// hàm xử lý thêm
		public function Add()
		{
			$idloaitin = $_POST["idloaitin"];
			$idnhomtin = $_POST["idnhomtin"];
			$nameloaitin = $_POST["nameloaitin"];
			$st = $_POST["status"];
			$a = new Db();
			$sql="insert into loaitin(Maloaitin, Manhomtin ,Tenloaitin ,Trangthai) values('$idloaitin ','$idnhomtin','$nameloaitin','$st') ";
			$arr=array();
			$q=$a->insert($sql,$arr);
			?>
			<script>
				alert("Đã thêm một loại tin vào danh sách.");
				window.location="index.php?mod=danhsachloaitin";
			</script>
			<?php
		}

	}
?>
<style type="text/css">
	.comment-form input.newstyle:focus 
	{
			border: 1px solid red;
	}
	.contain
	{ 
		padding:5px;
	}
</style>


