<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php">CỬA HÀNG MÁY TÍNH</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
          <i class="fa fa-laptop"></i>
          <span class="nav-link-text"> Máy tính</span>
        </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="admin.php?p=chipset">
          <i class="fa fa-microchip"></i>
          <span class="nav-link-text">  Chipset</span>
        </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="admin.php?p=production">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Hãng sản xuất</span>
        </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="admin.php?p=invoices">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Hóa Đơn</span>
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
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" data-toggle="modal" data-target="#loginModal"> -->
          <a class="nav-link" href="logout.php">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
</nav>
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <!-- content -->
      <div class="modal-body">
        <div class="card-body">
        <form method="POST">
            <div class="form-group">
              <!-- User -->
              <label class="form-control-label">User</label>
              <input type="text" name="username" class="form-control" style="width:300px;" name="Id">
            </div>
            <div class="form-group">
              <!-- Password -->
              <label class="form-control-label">Password</label>
              <input type="password" name="password" class="form-control" style="width:300px;" name="Ten">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Sign in</button>
            </form>
        </div>
      </div>
      <!-- end content -->
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>  
</div>
