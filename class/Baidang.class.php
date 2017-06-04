
<?php
	class BaiDang extends Db
	{	
		// hàm hiển thị
		public function show()
		{
			$sqldem = "select count(*) as dem from Tin where Trangthai=1";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 20;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;

			$sql = "select * from Tin where Trangthai=1 ORDER BY Matin DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
            <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Tin Đã Được Duyệt</h3>
            <hr width="50%">
            <div style="margin-bottom:5px;"> 
                <div style="float:left;">
                    <a href="../admin/index.php?mod=thaotac&ac=thembaidang" style="margin-right: 20px; color:#333; font-weight:bold;" title="Thêm">
                    <img src="../admin/images/icon/plus.png" width="30px" height="30px" alt="Thêm" />Thêm tin</a>
                    <a href="#" style="margin-right: 20px; color:#333; font-weight:bold;" title="Thêm+">
                    <img src="../admin/images/icon/plusnote.png" width="30px" height="30px" alt="Thêm+" />Thêm nhiều tin</a>
                     <a href="../admin/index.php?mod=thaotac&ac=baidangchuaduyet" style="margin-right: 20px; color:#333; font-weight:bold;" title="Duyệt">
                    <img src="../admin/images/icon/tick.png" width="30px" height="30px" alt="Duyệt" />Duyệt bài</a>
                  </div>
                  <div style="float:right;">
                   <form action="../admin/index.php?mod=xltimkiemtin" method="post">
						<input type="search" name="search" id="search" placeholder="Tìm kiếm">
           			</form>
                  </div>
              </div>
					<div class="tab-content default-tab" style="clear:both;">
						<table>
							<thead>
								<tr>
								    <th class="col-sm-1">Mã Tin</th>
                                    <th class="col-sm-1">Mã Loại Tin</th>
								    <th class="col-sm-2">Tiêu Đề</th>
								    <th class="col-sm-2">Tóm Tắt</th>
                                    <th class="col-sm-2">Nội Dung</th>
                                    <th class="col-sm-1">Ngày</th>
								    <th class="col-sm-1">Tác Giả</th>
								    <th class="col-sm-1">Trạng Thái</th>
                                    <th class="col-sm-1">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-1"><?php echo $s["Matin"]?></td>
                                    <td class="col-sm-1"><?php echo $s["Maloaitin"]?></td>
								    <td class="col-sm-2"><?php echo $s["Tieude"]?></td>
								    <td class="col-sm-2"><?php echo $s["Tomtat"]?></td>
                                    <td class="col-sm-2"><?php echo $s["Noidung"]?></td>
                                    <td class="col-sm-1"><?php echo $s["Ngay"]?></td>
								    <td class="col-sm-1"><?php echo $s["Tacgia"]?></td>
								    <td class="col-sm-1"><?php echo $s["Trangthai"]?></td>							
									<td class="col-sm-1">
										<!-- Icons -->
										 <a href="../admin/index.php?mod=thaotac&ac=editbaidang&matin=<?php echo $s["Matin"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-edit"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=xoabaidang&matin=<?php echo $s["Matin"];?>"style="color:#000" title="Delete" class="xoa" >
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
									<a class="a" href="index.php?mod=danhsachbaidang&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
									<?php	
								}
							?>
						</div>
					
				</div> 
			<?php
		}
		
		public function countbaidangchuaduyet()
		{
			$sql = "select count(*) as dem from baidang where Trangthai=0 ORDER BY Matin";
			$data = $this->select($sql);
			return $data[0]["dem"];
		}
		public function baidangchuaduyet()
		{
			$sql = "select * from tin WHERE Trangthai = 0 ORDER BY Matin";
			$data = $this->select($sql);
			?> <div class="content-box-content">
             <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Tin Chưa Được Duyệt</h3>
           		<hr width="50%">
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								   <th class="col-sm-6">Mã Tin</th>
								   <th class="col-sm-6">Mã Loại Tin</th>
								   <th class="col-sm-6">Tiêu Đề</th>
								   <th class="col-sm-6">Tóm Tắt</th>
								   <th class="col-sm-6">Nội Dung</th>
                                   <th class="col-sm-6">Tác Giả</th>
                                   <th class="col-sm-6">Thao Tác</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="4">
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
                            <?php 
							foreach($data as $s)
							{
								?>
								<tr>
									<td class="col-sm-6"><?php echo $s["Matin"];?></td>
									<td class="col-sm-6"><?php echo $s["Maloaitin"];?></td>
									<td class="col-sm-6"><?php echo $s["Tieude"];?></td>
									<td class="col-sm-6"><?php echo $s["Tomtat"];?></td>
                                    <td class="col-sm-6"><?php echo $s["Noidung"];?></td>
                                    <td class="col-sm-6"><?php echo $s["Tacgia"];?></td>
									<td class="col-sm-6"><?php echo $s["Trangthai"];?></td>

								   <td class="col-sm-3">
										<!-- Icons -->
										<script language="javascript"> 
											function CheckSure(){ 
											if( window.confirm("Bạn có chắc chắn muốn xóa không?")){ 
											return true; 
											}else{ 
											return false 
											} 
										} 
										</script>
											 <a href="../admin/index.php?mod=thaotac&ac=duyetbaidang&matin=<?php echo $s["Matin"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-upload"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=delbaidang&matin=<?php echo $s["Matin"];?>"style="color:#000" title="Delete" class="xoa" >
                                          <i class="fa fa-close"></i></a> 
										
									</td>

									
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table>
					</div> <!-- End #tab1 -->

				
				</div>
			<?php
		}
		public function duyetbaidang()
		{
			$mt= $_GET["matin"];
			$a = new Db();
			$sql ="update tin set Trangthai='1' where Matin ='$mt'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			 <script language="javascript">
			alert("Đã duyệt 1 tin");
		    window.location="index.php?mod=danhsachbaidang";
		    </script>
		    <?php
		}

		// hàm xóa
		public function remove()
		{
			$mt =$_GET["matin"];
			$a = new Db();
			$sql="delete from tin where Matin ='$mt'";
			$arr=array("'$mt'");
			$q=$a->delete($sql,$arr);
			if ($q==0) $thongbao="Lỗi xóa ";
				else $thongbao ="xoa $q tin ";
			?>
			<script>
			alert("Đã xóa một tin trong danh sách.");
			window.location="index.php?mod=danhsachbaidang";
			</script>
			<?php
		}
		public function xoa()
		{
			$mt =$_GET["matin"];
			$a = new Db();
			$sql="update tin set Trangthai='0' where  Matin ='$mt'";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			<script>
			alert("Đã xóa ẩn một tin trong danh sách.");
			window.location="index.php?mod=danhsachbaidang";
			</script>
			<?php
		}
		// hàm nhập liệu thêm
		public function formAdd()
		{
			
			?>
            <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Tin</h3>
            <hr width="50%">  
            <form action="index.php?mod=xlthembaidang" method="post" class="comment-form">
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Tin: </label>
                    <input type="text" id="matin" class="tb-my-input" name="idtin" placeholder="Mã Tin" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
				<label class="col-sm-2 clabel">Mã Loại Tin: </label>
                    <select name="idloai">
                    <option value="all">Chọn Tên Loại Tin</option>
					<?php 
					$sql = "select Maloaitin, Tenloaitin from loaitin ";
								$show = $this->select($sql);
					foreach($show as $s)
						{
						?>
                 	<option value="<?php echo $s["Maloaitin"] ?>"><?php echo $s["Tenloaitin"]?>
                 		<?php
	                   	}
	                    ?>
                 	</option>
                	</select>
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tiêu Đề: </label>
                    <input type="text" id="tieude" class="tb-my-input" name="tieude" placeholder="Tiêu Đề" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tóm Tắt: </label>
                    <input type="text" id="tomtat" class="tb-my-input" name="tomtat" placeholder="Tom Tắt" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Nội Dung: </label>
                    <textarea id="noidung" class="tb-my-input" name="noidung" placeholder="Nội Dung" aria-required="true" rows="10" cols="50"></textarea>
                </fieldset>
                <fieldset class="contain">
					<label class="col-sm-2 clabel">Ngày: </label>
                    <script>
                      $(function() {
                        $( "#ngay" ).datepicker();
                      });
                  </script>
                  <input type="datetime" id="ngay" name="ngay" placeholder="Chọn ngày">
               </fieldset>
               <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tác Giả: </label>
                    <input type="text" id="tacgia" class="tb-my-input" name="tacgia" placeholder="Tác Giả" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Trạng Thái: </label><select name="status" class="trangthai">
                 	<option value="0">0</option>
                 	<option value="1">1</option>
                	</select>
                </fieldset>

               	<label class="col-sm-2 clabel">
                	<input type="submit" name="Them" class="sub" value="Thêm"/>
                </label>
                </form>

               
            <?php 
		}

		// hàm xử lý thêm
		public function Add()
		{
			$idtin = $_POST["idtin"];
			$idloaitin = $_POST["idloai"];
			$tieude = $_POST["tieude"];
			$tomtat = $_POST["tomtat"];
			$noidung = $_POST["noidung"];
			$ngay = $_POST["ngay"];
			$tacgia = $_POST["tacgia"];
			$st = $_POST["status"];
			$a = new Db();
			$sql="insert into tin(Matin, Maloaitin ,Tieude, Tomtat, Noidung, Ngay, Tacgia, Trangthai) values('$idtin','$idloaitin','$tieude','$tomtat','$noidung','$ngay','$tacgia','$st') ";
			$arr=array();
			$q=$a->insert($sql,$arr);
			?>
			<script>
				alert("Đã thêm một tin vào danh sách.");
				window.location="index.php?mod=danhsachbaidang";
			</script>
			<?php
		}
		// hàm sửa 
		public function formEdit()
		{
			$mt=$_GET["matin"];
			$sql = "select * from Tin where Matin='$mt' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
            <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Tin</h3>
            <hr width="50%">  
			<form action="index.php?mod=thaotac&ac=xleditbaidang" method="post" class="comment-form">
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Tin: </label>
                    <input type="hidden" id="matin" name="idtin" size="32" aria-required="true" value="<?php echo $s["Matin"]; ?>">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tiêu Đề: </label>
                    <input type="text" id="tieude" name="tieude" value="<?php echo $s["Tieude"]; ?>" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tóm Tắt: </label>
                    <input type="text" id="tomtat" value="<?php echo $s["Tomtat"]; ?>" name="tomtat" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Nội Dung: </label>
                    <textarea id="noidung" name="noidung" aria-required="true" rows="10" cols="50"><?php echo $s["Noidung"]; ?>></textarea>
                </fieldset>
                <fieldset class="contain">
					<label class="col-sm-2 clabel">Ngày: </label>
                    <script>
                      $(function() {
                        $( "#ngay" ).datepicker();
                      });
                  </script>
                  <input type="datetime" id="ngay" name="ngay" placeholder="Chọn ngày" style="float:none;">
               </fieldset>
               <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tác Giả: </label>
                    <input type="text" id="tacgia" value="<?php echo $s["Tacgia"]; ?>" name="tacgia" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Loại Tin: </label>
                    <select name="idloai">
                    <option value="all">Chọn Tên Loại Tin</option>
					<?php 
					$sql = "select Maloaitin, Tenloaitin from loaitin ";
								$show = $this->select($sql);
					foreach($show as $s)
						{
						?>
                 	<option value="<?php echo $s["Maloaitin"] ?>"><?php echo $s["Tenloaitin"]?>
                 		<?php
	                   	}
	                    ?>
                 	</option>
                	</select>
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Trạng Thái: </label><select name="status" class="trangthai">
                 	<option value="0">0</option>
                 	<option value="1">1</option>
                	</select>
                </fieldset>

               	<label class="col-sm-2 clabel">
                	<input type="submit" name="Sua" class="sub" value="Sửa"/>
                </label>
                </form>

			<?php
			}

		}

		// hàm xử lý sửa
		public function Edit()
		{
			$id = $_POST["idtin"];
			$idloai = $_POST["idloai"];
			$tieude = $_POST["tieude"];
			$tomtat = $_POST["tomtat"];
			$noidung = $_POST["noidung"];
			$ngay = $_POST["ngay"];
			$tacgia = $_POST["tacgia"];
			$st = $_POST["status"];

			$a = new Db();
			$sql="update tin set Tieude='$tieude',Tomtat='$tomtat',Noidung='$noidung',Ngay='$ngay',Tacgia='$tacgia', Maloaitin = '$idloai', Trangthai='$st'  where  Matin='$id'  ";
			$arr=array();
			$q=$a->update($sql,$arr);

			?>


			<script >
			alert("Đã sửa một loại tin trong danh sách.");
			window.location="index.php?mod=danhsachbaidang";
			</script>
			<?php
		}
		public function xltimkiemtin()
		{
		$tk = $_POST["search"];
		$sql = "select * from tin where Tieude like '%$tk%' or Tomtat like '%$tk%' " ;
		$show = $this->select($sql);
		if(count($show) > 0)
		{
		?>
		<h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Từ Khóa "<?php echo $tk ?>"</h3>
        <hr width="50%">
		<div class="tab-content default-tab" style="clear:both;">
						<table>
							<thead>
								<tr>
								    <th class="col-sm-1">Mã Tin</th>
                                    <th class="col-sm-1">Mã Loại Tin</th>
								    <th class="col-sm-2">Tiêu Đề</th>
								    <th class="col-sm-2">Tóm Tắt</th>
                                    <th class="col-sm-1">Ngày</th>
								    <th class="col-sm-1">Tác Giả</th>
								    <th class="col-sm-1">Trạng Thái</th>
                                    <th class="col-sm-1">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-1"><?php echo $s["Matin"]?></td>
                                    <td class="col-sm-1"><?php echo $s["Maloaitin"]?></td>
								    <td class="col-sm-2"><?php echo $s["Tieude"]?></td>
								    <td class="col-sm-2"><?php echo $s["Tomtat"]?></td>
                                    <td class="col-sm-1"><?php echo $s["Ngay"]?></td>
								    <td class="col-sm-1"><?php echo $s["Tacgia"]?></td>
								    <td class="col-sm-1"><?php echo $s["Trangthai"]?></td>							
									<td class="col-sm-1">
										<!-- Icons -->
										 <a href="../admin/index.php?mod=thaotac&ac=editbaidang&matin=<?php echo $s["Matin"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-edit"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=delbaidang&matin=<?php echo $s["Matin"];?>"style="color:#000" title="Delete" class="xoa" >
                                          <i class="fa fa-close"></i></a> 
									
									</td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table>
		</div> <!-- End #tab1 -->
		<?php
		}
		else {
			?>
			<script type="text/javascript">
				alert("Không Tìm Thấy");
				window.location="index.php?mod=danhsachbaidang";
			</script>
			<?php
			}
		}

	}
?>
<style>
input {
	outline: none;
}
input[type=search] {
	-webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
	display: none; /* remove the search and cancel icon */
}
input[type=search] {
	background: #ededed url(../admin/images/icon/search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 40px;
	
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 150px;
	background-color: #fff;
	border-color: #6dcff6;
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}
</style>
