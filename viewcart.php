<meta charset="utf-8" name="" content="">
<h3>Thông tin giỏ hàng</h3>
<hr>
<form action='updatecart.php' method='POST'>
  <?php if(isset($_SESSION['cart']) && $_SESSION['cart']!=null){?>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã</th>
              <th>Tên</th>
              <th>Hãng SP</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Thành tiền</th>
              <th></th>
            </tr>
          </thead>
          <?php
                //session_start();
                    foreach($_SESSION['cart'] as $list){
            ?>
          <tr>
            <td>
            <?php echo $list['id'];?>
            </td>
            <td>
            <?php echo $list['ten'];?>
            </td>
            <td>
            <?php echo $list['hang'];?>
            </td>
            <td>
            <?php echo "<input type='number' style='width:60px' value='".$list['qty']."' name='qty[".$list['id']."]' />";?>
            </td>
            <td>
            <?php echo $list['gia'];?>
            </td>
            <td>
            <?php echo $list['gia']*$list['qty'];?>
            </td>
            <td>
            <a href="deletecart.php?del=<?php echo $list['id']?>">Xóa</a>
            </td>
            <?php }
         //    echo "<pre>";
        //    print_r($_SESSION['cart']);    
        ?>
        </tr>
        <tbody>
        </tbody>
        </table>
      </div>
        <input type='submit' class="btn btn-primary" value='Update' name='btnUpdate'>
        <a class="btn btn-primary" href="index.php?p=taohoadon">Save</a>
      <?php } ?>
    <!-- <input type='submit' value='SAVE' name='btnSave'> -->
</form>