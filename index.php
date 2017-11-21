<html>
<?php
    session_start();     
    if(isset($_GET["p"])){
        $p=$_GET["p"];
    }
    else
    $p="";
?>
<?php
    $total =0;
    if(isset($_SESSION['cart'])&& $_SESSION['cart']!=null)
    {
        foreach($_SESSION['cart'] as $list){
            $total+=$list['qty'];
        }
    }
echo $total;
?>
<head>
    <title>Home</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                    <a class="navbar-brand" href="index.php">CỬA HÀNG MÁY TÍNH</a>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Máy Tính">
                                <a class="nav-link" href="index.php">
                                    <i class="fa fa-fw fa-dashboard"></i>
                                    <span class="nav-link-text">Máy Tính</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Điện Thoại">
                                <a class="nav-link" href="charts.html">
                                    <i class="fa fa-fw fa-area-chart"></i>
                                    <span class="nav-link-text">Điện Thoại</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Thiết bị Mạng">
                                <a class="nav-link" href="tables.html">
                                    <i class="fa fa-fw fa-table"></i>
                                    <span class="nav-link-text">Thiết bị Mạng</span>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Thiết bị văn phòng">
                                <a class="nav-link" href="tables.html">
                                    <i class="fa fa-fw fa-table"></i>
                                    <span class="nav-link-text">Thiết bị văn phòng</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav sidenav-toggler">
                            <li class="nav-item">
                                <a class="nav-link text-center" id="sidenavToggler">
                                    <i class="fa fa-fw fa-angle-left"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=giohang">
                                    <i class="fa fa-shopping-cart"></i>
                                    <?php if(isset($total)&&$total>0) echo $total;?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="page/login.php">
                                    <i class="fa fa-sign-in"></i> Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-3">
                <h1 class="my-4">
                </h1>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-10" style="margin-left:200px;">
                <!-- Content -->
                <?php 
                    switch($p){
                        case "detailproduct": require "detailproduct.php";
                            break;
                        case "themgiohang": require "insertcart.php";
                            break;
                        case "giohang": require "viewcart.php";
                            break;
                        case "taohoadon": require "createinvoice.php";
                            break;    
                        case "guihoadon": require "insertinvoice.php";
                            break;
                        default    : require "homecontent.php";
                            break;
                    }
                ?>
                <!-- End Content -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</body>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.boo tstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/sb-admin-charts.min.js"></script>

</html>