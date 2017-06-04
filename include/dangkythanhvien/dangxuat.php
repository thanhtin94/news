<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?php
if (!isset($_SESSION)) session_start();
session_destroy();
?>
<script>
	alert("Đăng xuất thành công.");
	window.location="dangnhap.php";
</script>