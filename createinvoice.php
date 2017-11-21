<?php
     if(isset($_POST['createHD'])){
        if($_POST['Ten']==null||$_POST['SDT']==null){
            if($_POST['Ten']==null)
            $messageTen = "Chưa điền vào Tên !";
            if($_POST['SDT']==null)
            $messageSDT = "Chưa điền vào SĐT !";
        }
        else
        {
            $_SESSION['TenKH'] = $_POST['Ten'];
            $_SESSION['SDT'] = $_POST['SDT'];
            header('location:index.php?p=guihoadon');
        }
    }
?>
<div class="content-wrapper" style="margin-left:-20px;">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php?p=taohoadon">LẬP HÓA ĐƠN</a>
        </li>
    </ol>
    <!-- Content -->
    <div class="card-body">
        <form method="POST" action="index.php?p=taohoadon" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-control-label">Họ Tên KH</label>
                <?php if(isset($messageTen)){ echo "<br><div style='color:red;'>".$messageTen."</div>";} ?>
                <input type="text" class="form-control" style="width:300px;"
                name="Ten" value="<?php if(isset($_POST['Ten'])){echo $_POST['Ten'];} ?>">
            </div>
            <div class="form-group">
                <label class="form-control-label">SĐT</label>
                <?php if(isset($messageSDT)){ echo "<br><div style='color:red;'>".$messageSDT."</div>";} ?>
                <input type="number" class="form-control" style="width:300px;" name="SDT"
                value="<?php if(isset($_POST['SDT'])){echo $_POST['SDT'];} ?>"
                >
            </div>
            <button type="submit" class="btn btn-primary" name="createHD">GỬI HÓA ĐƠN</button>
        </form>
    </div>
    <!-- End Content -->
    </div>
</div>