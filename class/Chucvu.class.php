<?php
	class ChucVu extends Db
	{	
		// hàm hiển thị
		public function show()
		{
			$sqldem = "select count(*) as dem from chucvu";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 20;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;

			$sql = "select * from chucvu ORDER BY Machucvu DESC limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
            <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Chức Vụ</h3>
            <hr width="50%"> 
             <a href="../admin/index.php?mod=thaotac&ac=themchucvu" style="margin-right: 20px; color:#333; font-weight:bold;" title="Add">
				<img src="../admin/images/icon/plus.png" width="30px" height="30px" alt="Add" />Thêm chức vụ</a>
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								    <th class="col-sm-4">Mã Chức Vụ</th>
								    <th class="col-sm-9">Tên Chức Vụ</th>
                                    <th class="col-sm-4">Thao Tác</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-4"><?php echo $s["Machucvu"]?></td>
									<td class="col-sm-9"><?php echo $s["Tenchucvu"];?></td>							
									<td class="col-sm-4">
										<!-- Icons -->
										 <a href="../admin/index.php?mod=thaotac&ac=editchucvu&machuc=<?php echo $s["Machucvu"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-edit"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=delchucvu&machuc=<?php echo $s["Machucvu"];?>"style="color:#000" title="Delete" class="xoa" >
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
									<a class="a" href="index.php?mod=danhsachchucvu&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
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
			$mcv =$_GET["machuc"];
			$a = new Db();
			$sql="delete from chucvu where Machucvu ='$mcv' ";
			$arr=array("'$mcv'");
			$q=$a->delete($sql,$arr);
			if ($q==0) $thongbao="Lỗi xóa ";
				else $thongbao ="xoa $q chức vụ";
			?>
			<script>
			alert("Đã xóa một chức vụ trong danh sách.");
			window.location="index.php?mod=danhsachchucvu";
			</script>
			<?php
		}
		// hàm sửa 
		public function formEdit()
		{
			$mcv=$_GET["machuc"];
			$sql = "select * from chucvu where Machucvu ='$mcv' ";
			$show = $this->select($sql);
			foreach($show as $s)
			{
			?>
            <h3 align="center"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Chức Vụ</h3>
            <hr width="50%">  
			<form action="index.php?mod=thaotac&ac=xleditchucvu" method="post" class="comment-form">
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Mã Chức Vụ: </label><?php echo $mcv; ?>
                    <input type="hidden" name="id" value="<?php echo $s["Machucvu"]; ?>" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                    <label class="col-sm-2 clabel">Tên Chức Vụ</label>
                    <input type="text" id="tenchucvu" name="name" value="<?php echo $s["Tenchucvu"]; ?>" size="32" aria-required="true" >
                </fieldset>
                 <fieldset class="contain">
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


			$a = new Db();
			$sql="update chucvu set Tenchucvu ='$name' where  Machucvu ='$id'  ";
			$arr=array();
			$q=$a->update($sql,$arr);

			?>


			<script >
			alert("Đã sửa một chức vụ trong danh sách.");
			window.location="index.php?mod=danhsachchucvu";
			</script>
			<?php
		}
		// hàm nhập liệu thêm
		public function formAdd()
		{
			
			?>
            <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Chức Vụ</h3>
            <hr width="50%">  
            <form action="index.php?mod=xlthemchucvu" method="post" class="comment-form">
                <fieldset class="contain">
                <label class="col-sm-2 clabel">Mã Chức Vụ: </label>
                    <input type="text" id="machucvu" class="tb-my-input" name="idchucvu" placeholder="Mã Chức Vụ" size="32" aria-required="true">
                </fieldset>
                <fieldset class="contain">
                	<label class="col-sm-2 clabel">Tên Chức Vụ: </label>
                    <input type="text" id="tenchucvu" class="tb-my-input" name="namechucvu" placeholder="Tên Chức Vụ" size="32" aria-required="true">
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
			$idchucvu = $_POST["idchucvu"];
			$namechucvu = $_POST["namechucvu"];
			$a = new Db();
			$sql="insert into chucvu(Machucvu ,Tenchucvu) values('$idchucvu ','$namechucvu') ";
			$arr=array();
			$q=$a->insert($sql,$arr);
			?>
			<script>
				alert("Đã thêm một chức vụ vào danh sách.");
				window.location="index.php?mod=danhsachchucvu";
			</script>
			<?php
		}

	}
?>