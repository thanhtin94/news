<?php
	class DangBai1 extends Db
	{	
	public function formAdd()
		{
			
			?>
            <h3 align="center"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Thêm Tin</h3>
            <hr width="50%">  
            <form action="index3.php?mod=xlthembai" method="post" class="comment-form">
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
			$st = 0;
			$a = new Db();
			$sql="insert into tin(Matin, Maloaitin ,Tieude, Tomtat, Noidung, Ngay, Tacgia, Trangthai) values('$idtin','$idloaitin','$tieude','$tomtat','$noidung','$ngay','$tacgia','$st') ";
			$arr=array();
			$q=$a->insert($sql,$arr);
			?>
			<script>
				alert("Đã thêm một tin vào danh sách.");
				window.location="index3.php";
			</script>
			<?php
		}
	}
?>