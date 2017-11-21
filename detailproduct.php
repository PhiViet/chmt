<?php 
    //require 'product.php';
    $doc = simplexml_load_file('data/pc-laptop.xml');
    // Get input
    foreach($doc->pc as $pc){
        if($pc->id==$_GET['show']){
            $Id = $pc->id;
            $Ten =  $pc->ten;
            $Hang = $pc->hang;
            $Image = $pc->image;
            $Chip = $pc->chipset;
            $CPU = $pc->cpu;
            $CD = $pc->cd;
            $Gia = $pc->gia;
            break;
        }
    }
?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-12">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="data/image/<?php echo $Image ?>" style="width:700px;height:300px" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $Ten ?></h3>
              <div class="row">
                <div class="col-lg-5">
                  <h4><?php echo $Gia ?> vnđ</h4>
                  <a href="index.php?p=themgiohang&id=<?=$Id?>" class="btn btn-info">Đặt Hàng</a>
                </div>
                <div class="col-lg-2">
                  <p class="card-text">Hãng sản xuất : <?php echo $Hang ?></p>
                  <p class="card-text">Hãng CPU : <?php echo $Chip ?></p>
                  <p class="card-text">Tốc độ CPU : <?php echo $CPU ?></p>
                  <p class="card-text">Loại ổ đĩa : <?php echo $CD ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Đánh giá sản phẩm
            </div>
            <div class="card-body">
              <p><?php echo $Ten?> là sản phẩm tốt</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Dùng OK</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Máy hơi lag</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-lg-12 -->
      </div>

    </div>
    <!-- /.container -->