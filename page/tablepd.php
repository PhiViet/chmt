<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin.php">Máy tính</a>
      </li>
      <!-- <li class="breadcrumb-item active">PC</li> -->
    </ol>
    <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã</th>
              <th>Tên</th>
              <th>Hãng</th>
              <th>Image</th>
              <th>Chipset</th>
              <th>Tốc độ CPU</th>
              <th>Loại CD</th>
              <th>Giá</th>
              <th>
                <a href="admin.php?p=insert">
                <i class="fa fa-plus-square" aria-hidden="true"> ADD</i>
                </a>
              </th>
            </tr>
          </thead>
          <?php include 'product.php'      
          ?>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
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