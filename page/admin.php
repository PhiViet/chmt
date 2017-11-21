<?php
    session_start();
    if(isset($_GET["p"])){
        $p=$_GET["p"];
    }
    else
    $p="";
?>
<html>
<head>
    <title>Admin</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
    //session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header("Location:login.php");
    }
    include('border.php');
?>
<?php 
    switch($p){
        case "chipset": require "chipset.php";
            break;
        case "insertchipset": require "insertchipset.php";
            break;
        case "updatechipset": require "updatechipset.php";
            break;
        case "insertproduction": require "insertproduction.php";
            break;
        case "production": require "production.php";
            break;
        case "insert": require "insert.php";
            break;
        case "updateproduction":require "updateproduction.php";
            break;
        case "update": require "update.php";
            break;
        case "invoices":require "invoices.php";
            break;
        case "detailinvoice": require "detailinvoice.php";
            break;
        default    : require "tablepd.php";
            break;
    }
?> 
       <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    
    <!-- Custom scripts for all pages -->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
</body>
</html>