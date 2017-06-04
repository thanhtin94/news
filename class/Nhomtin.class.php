
<?php
	class NhomTin extends Db
	{	
		// hàm hiển thị
		public function show()
		{
			$sqldem = "select count(*) as dem from nhomtin";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 10;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;

			$sql = "select * from Nhomtin ORDER BY Manhomtin DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
					<div class="tab-content default-tab" id="tab1">
                                <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Nhóm Tin</h3>
            <hr width="50%"> 
                    <a href="../admin/index.php?mod=thaotac&ac=themnhomtin" style="margin-right: 20px; color:#333; font-weight:bold;" title="Add">
                                         <img src="../admin/images/icon/plus.png" width="30px" height="30px" alt="Add" style="color:#333"/>Thêm nhóm tin</a>
						<table>
							<thead>
								<tr>
								    <th class="col-sm-3">Mã Nhóm Tin</th>
								    <th class="col-sm-6">Tên Nhóm Tin</th>
								    <th class="col-sm-6">Trạng Thái</th>
                                    <th class="col-sm-3">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-3"><?php echo $s["Manhomtin"]?></td>
									<td class="col-sm-6"><?php echo $s["Tennhomtin"];?></td>
									<td class="col-sm-6"><?php echo $s["Trangthai"];?></td>								
									<td class="col-sm-3">
										 <a href="../admin/index.php?mod=thaotac&ac=edit&manhom=<?php echo $s["Manhomtin"];?>" style="color:#666; margin-right:20px;" title="Edit"><i class="fa fa-edit"></i>
                                         </a>
										<a href="../admin/index.php?mod=thaotac&ac=delnhomtin&manhom=<?php echo $s["Manhomtin"];?>"style="color:#000" title="Delete" class="xoa">
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
						<div style="color:#F00; clear:both; text-align:center; font-size:16px;">
							<?php
								for($i=1; $i<= $sotrang; $i++)
								{
									?>
									<a class="a" href="index.php?mod=danhsachnhomtin&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;						
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
			$mn =$_GET["manhom"];
			$a = new Db();
			$sql="delete from nhomtin where Manhomtin ='$mn' ";
			$arr=array("'$mn'");
			$q=$a->delete($sql,$arr);
			if ($q==0) $thongbao= "Lỗi xóa ";
				else $thongbao = "xoa $q nhóm tin ";
			?>
			<script >
			alert("Đã xóa một nhóm tin trong danh sách.");
			window.location="index.php?mod=danhsachnhomtin";
			</script>
			<?php
		}
		// hàm sửa 
		public function formEdit()
		{
			$mn=$_GET["manhom"];
			$sql = "select * from nhomtin where Manhomtin='$mn' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
            <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Nhóm Tin</h3>
            <hr width="50%">  
			<form action="index.php?mod=thaotac&ac=xledit" method="post" class="comment-form" >
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã Nhóm Tin: </label><?php echo $mn; ?>
                    <input type="hidden" name="id" value="<?php echo $s["Manhomtin"]; ?>" size="32" aria-required="true">
                </fieldset>

                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên Nhóm Tin</label>
                    <input type="text" id="tennhom" name="name" value="<?php echo $s["Tennhomtin"]; ?>" size="32" aria-required="true" >
                </fieldset>
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Trạng Thái: </label><select name="status" value="<?php echo $s["Trangthai"]; ?>" class="trangthai">
                 	<option value="0">0</option>
                 	<option value="1">1</option>
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
			$name = $_POST["name"];
			$st = $_POST["status"];

			$a = new Db();
			$sql="update nhomtin set Tennhomtin='$name',Trangthai='$st'  where  Manhomtin='$id'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			<script >
			alert("Đã sửa một nhóm tin trong danh sách.");
			window.location="index.php?mod=danhsachnhomtin";
			</script>
			<?php
		}
		// hàm nhập liệu thêm
		public function formAdd()
		{
			?>
            <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Nhóm Tin</h3>
            <hr width="50%"> 
            <form action="index.php?mod=xlthemnhomtin" method="post" class="comment-form">
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Nhóm Tin: </label>
                    <input type="text" id="manhom" class="tb-my-input" name="idnhomtin" placeholder="Mã Nhóm Tin" size="32" aria-required="true">
                </fieldset>

                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tên Nhóm Tin: </label>
                    <input type="text" id="tennhom" class="tb-my-input" name="namenhomtin" placeholder="Tên Nhóm Tin" size="32" aria-required="true">
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
			$idnhomtin = $_POST["idnhomtin"];
			$namenhomtin = $_POST["namenhomtin"];
			$st = $_POST["status"];
			$a = new Db();
			$sql="insert into nhomtin(Manhomtin,Tennhomtin,Trangthai) values('$idnhomtin','$namenhomtin','$st') ";
			$arr=array();
			$q=$a->insert($sql,$arr);
			?>
			<script>
				alert("Đã thêm một nhóm tin vào danh sách.");
				window.location="index.php?mod=danhsachnhomtin";
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