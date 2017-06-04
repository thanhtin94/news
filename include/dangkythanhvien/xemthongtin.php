<!DOCTYPE html>
<html>
<head>
<title>Thông Tin Tài Khoản </title>


</head>
<body>
  <?php 
  $mu = $_GET["mauser"];
  $arr = $Db->select("select * from user, chucvu where Mauser ='$mu' and user.Machucvu = chucvu.Machucvu")
   ?>
  <div class="baongoai">
    <h3 align="center"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;&nbsp;Thông Tin Tài Khoản</h3>
    <hr width="50%">     
     <table align="center">
		<thead>
			<tr>
				 <th class="col-sm-2">Tên tài khoản</th>
                 <th class="col-sm-2">Họ và tên</th>
				 <th class="col-sm-1">Email</th>
                 <th class="col-sm-2">Ngày sinh</th>
				 <th class="col-sm-1">Giới tính</th>
				 <th class="col-sm-2">Chức Vụ</th>
				 <th class="col-sm-2">Hiện Trạng</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="col-sm-2"><?php echo $arr[0]["Tentaikhoan"]; ?></td>
                <td class="col-sm-2"><?php echo $arr[0]["Hoten"]; ?></td>
				<td class="col-sm-1"><?php echo $arr[0]["Email"]; ?></td>
                <td class="col-sm-2"><?php echo $arr[0]["Ngaysinh"]; ?></td>
                <td class="col-sm-1"> 
				<?php if($arr[0]["Gioitinh"]==1)
						  echo "Nữ"; 
					 else 
						  echo "Nam";
				?></td>	
				<td class="col-sm-2"><?php echo $arr[0]["Tenchucvu"]; ?></td>	
				<td class="col-sm-2"><?php 
										if($arr[0]["Ttlamviec"]== 1)
											echo "Đang làm việc";
										else  
											echo "Đã nghỉ việc";

									?></td>						
			</tr>
	
		</tbody>
	</table>
  </div> 
</body>
</html>

<style type="text/css">
  .baongoai {
	  margin:auto;
  }
</style>