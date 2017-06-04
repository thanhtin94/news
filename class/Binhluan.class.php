<?php

	class BinhLuan extends Db
	{
		public function show()
		{
			$sqldem = "select count(*) as dem from binhluan where trangthai=1";
			$kqdem = $this->select($sqldem);
			$n = $kqdem[0]["dem"];
			$pageSize = 10;
			$sotrang = ceil($n/$pageSize);

			$page = isset($_GET["page"])?$_GET["page"]:1;
			$vt = ($page-1) *$pageSize;

			$sql = "select a.*, b.Tieude, c.Tentaikhoan from binhluan a, tin b, user c WHERE
						a.Matin = b.Matin AND
						a.Mauser = c.Mauser AND
						a.trangthai = 1 limit $vt, $pageSize";
			$show = $this->select($sql);
			?> <div class="content-box-content">
			 <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Bình Luận Đã Được Duyệt</h3>
            <hr width="50%"> 
               
               		<div> 
               		<a href="../admin/index.php?mod=thaotac&ac=binhluanchuaduyet" style="margin-right: 20px; color:#333; font-weight:bold;" title="Duyệt">
                    <img src="../admin/images/icon/tick.png" width="30px" height="30px" alt="Duyệt" />Duyệt bình luận</a>
                    </div>
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								   <th class="col-sm-2">Tiêu Đề</th>
								   <th class="col-sm-2">Thành Viên</th>
								   <th class="col-sm-4">Nội Dung</th>
								   <th class="col-sm-2">Ngày Bình Luận</th>
								   <th class="col-sm-2">Trạng Thái</th>
                                    <th class="col-sm-2">Thao Tác</th>
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
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-2"><?php echo $s["Tieude"]?></td>
									<td class="col-sm-2"><?php echo $s["Tentaikhoan"];?></td>
									<td class="col-sm-4"><?php echo $s["Noidung"];?></td>
									<td class="col-sm-2"><?php echo $s["Ngaybinhluan"];?></td>
									<td class="col-sm-2"><?php echo $s["Trangthai"];?></td>

								   <td class="col-sm-3">
										<!-- Icons -->
										
										  
										<a href="../admin/index.php?mod=thaotac&ac=delbinhluan&mabinhluan=<?php echo $s["Mabinhluan"];?>" title="Delete" class="xoa"> <i class="fa fa-close"></i></a> 
										
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
						<div style="color:#F00; clear:both; text-align:center;">
							<?php
								for($i=1; $i<= $sotrang; $i++)
								{
									?>
									<a class="a" href="index.php?mod=danhsachbinhluan&page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
									<?php	
								}
							?>
						</div>

					</div> <!-- End #tab1 -->

				
				</div> <!-- End .content-box-content -->
			<?php
		}
		public function countCommentchuaduyet()
		{
			$sql = "select count(*) as dem from binhluan where trangthai=0";
			$data = $this->select($sql);
			return $data[0]["dem"];
		}

		public function binhluanchuaduyet()
		{

			$sql = "select a.*, b.Tieude, c.Tentaikhoan from binhluan a, tin b, user c WHERE
						a.Matin = b.Matin AND
						a.Mauser = c.Mauser AND
						a.trangthai = 0";
			$show = $this->select($sql);
			?> <div class="content-box-content">
			 <h3 align="center"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Danh Sách Bình Luận Chưa Được Duyệt</h3>
            <hr width="50%"> 
					<div class="tab-content default-tab" id="tab1">
						<table>
							<thead>
								<tr>
								   <th class="col-sm-2">Tiêu Đề</th>
								   <th class="col-sm-2">Thành Viên</th>
								   <th class="col-sm-4">Nội Dung</th>
								   <th class="col-sm-2">Ngày Bình Luận</th>
								   <th class="col-sm-2">Trạng Thái</th>
                                    <th class="col-sm-2">Thao Tác</th>
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
							foreach($show as $s)
							{
								?>
								<tr>
									<td class="col-sm-2"><?php echo $s["Tieude"]?></td>
									<td class="col-sm-2"><?php echo $s["Tentaikhoan"];?></td>
									<td class="col-sm-4"><?php echo $s["Noidung"];?></td>
									<td class="col-sm-2"><?php echo $s["Ngaybinhluan"];?></td>
									<td class="col-sm-2"><?php echo $s["Trangthai"];?></td>

								   <td class="col-sm-3">
										<!-- Icons -->
										
										   <a href="../admin/index.php?mod=thaotac&ac=duyetbinhluan&mabinhluan=<?php echo $s["Mabinhluan"];?>" style="color:#666; margin-right:20px;" title="Edit">
                                         <i class="fa fa-upload"></i></a>
										 <a href="../admin/index.php?mod=thaotac&ac=delbinhluan&mabinhluan=<?php echo $s["Mabinhluan"];?>" title="Delete" class="xoa"> <i class="fa fa-close"></i></a> 
										
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
						<div style="color:#F00; clear:both; text-align:center;">
					</div>
				</div> 
                <?php 
		}

		public function duyetbinhluan()
		{
			$idbinhluan= $_GET["mabinhluan"];
			$a = new Db();
			$sql ="update binhluan set trangthai='1' where Mabinhluan='$idbinhluan'  ";
			$arr=array();
			$q=$a->update($sql,$arr);
			?>
			 <script language="javascript">
			alert("đã duyệt 1 bình luận");
		    window.location="index.php?mod=danhsachbinhluan";
		    </script>
		    <?php
		}
		public function xoabinhluan()
		{
			$idbinhluan= $_GET["mabinhluan"];
			$a = new Db();
			$sql ="delete from binhluan where Mabinhluan='$idbinhluan'  ";
			$arr=array();
			$q=$a->delete($sql,$arr);
			?>
			 <script language="javascript">
			alert("Đã xóa 1 bình luận");
		    window.location="index.php?mod=danhsachbinhluan";
		    </script>
		    <?php
		}
	}
?>