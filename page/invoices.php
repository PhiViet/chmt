<?php
    $doc = new DOMDocument('1.0','UTF-8');
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = false;
    $doc = simplexml_load_file('../data/invoices.xml');
?>
<div class="content-wrapper">
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="admin.php?p=invoices">Hóa Đơn</a>
    </li>
  </ol>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th></th>
          </tr>
        </thead>
        <?php
        $temp;
          foreach($doc->invoice as $invoice){
            $ID = $invoice->ID;
            $TenKH = $invoice->tenKH;
            $SDT = $invoice->SDT;
              /*
              <id>HH03</id>
    <ten>6006U</ten>
    <hang>HP</hang>
    <qty>3</qty>
    <gia>13000000</gia>
    <thanhtien>39000000</thanhtien>
              */
        ?>
        <tr>
          <td>
          <?php echo $ID;?>
          </td>
          <td>
          <?php echo $TenKH;?>
          </td>
          <td>
          <?php echo $SDT;?>
          </td>
          <td style="width:100px;">
          <input type="button" class="btn btn-info btn-sm" name="Detail"
          value="Chi Tiết" data-toggle="modal" data-target="#myModal">
            <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <?php 
                foreach($invoice->product as $product){
                  $IdProduct = $product->id;
                  echo $IdProduct;
                }
                ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          </td>
          
          <?php } ?>
        </tr>
      <tbody>
      </tbody>
      </table>
    </div>
  </div>
  <div class="card mb-3">
  </div>
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <!-- Footer -->
      </div>    
    </div>
  </footer>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
</div>
</div>