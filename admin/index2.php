<!doctype html>
<html lang="en">
<?php
include "../config/config.php";
include "../class/Db.class.php";
include "../class/Binhluan1.class.php";
$Db = new Db();
$Bl = new Binhluan();
if(!isset($_SESSION))session_start();
if(isset($_SESSION["quantri"]));
if(!isset($_SESSION["quantri"]))
{
 header('Location: ../include/dangkythanhvien/dangnhap.php');
}
?>
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Chào mừng đến trang quản lý</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/datepicker.css" rel="stylesheet" />
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/jquery.date.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="jquery.shorten.1.0.js"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="images/sidebar.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index2.php" class="simple-text">
                    Welcome Quản Trị
                </a>
            </div>

            <ul class="nav">
                 <li>
                    <a href="index2.php?mod=danhsachbinhluan"><i class="fa fa-keyboard-o"></i>
                    <p>Quản lý bình luận</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index2.php?mod=xemthongtin&mauser=<?php echo $_SESSION["quantri"]["Mauser"]; ?>">
                            <i class="fa fa-user"></i>Xem thông tin
                            </a>
                        </li>
                        <li>
                            <a href="index2.php?mod=suathongtin2&mauser=<?php echo $_SESSION["quantri"]["Mauser"]; ?>">
                            <i class="fa fa-edit"></i>Sửa thông tin
                            </a>
                        </li>
                        <li>
                            <a href="../include/dangkythanhvien/dangxuat.php">
                            <i class="fa fa-sign-out"></i>Đăng Xuất
                            </a>     
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <?php include "mod.php" ?>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    
                </nav>
            </div>
        </footer>

    </div>
</div>


</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
</html>
