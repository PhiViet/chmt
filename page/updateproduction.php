<?php 
    $doc = simplexml_load_file('../data/production.xml');
    if(isset($_POST['update']))
    {
        // Post xml
        foreach($doc->hang as $hang){
            if($hang->id==$_POST['Id']){
                 // // $doc->id = $_POST['Id'];
                $hang->ten = $_POST['Ten'];
                $hang->mota = $_POST['Mota'];
                break;
            }
        }
        file_put_contents('../data/production.xml',$doc->asXML());
        header('location:admin.php?p=production');        
    }
    
    // Get input
    foreach($doc->hang as $hang){
        if($hang->id==$_GET['edit']){
            $Id = $hang->id;
            $Ten =  $hang->ten;
            $Mota = $hang->mota;
            break;
        }
    }
//}  
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">SỬA SP</a>
      </li>
    </ol>
    <!-- Content -->
    <div class="card-body">
      <form method="POST" action="updateproduction.php">
      <div class="form-group">
            <label class="form-control-label">Mã</label>
            <input type="text" readonly="" class="form-control" style="width:300px;" name="Id" value="<?php echo $Id ?>">
          </div>
          <br>
          <div class="form-group">
            <label class="form-control-label">Tên Hàng Hóa</label>
            <input type="text" class="form-control" style="width:300px;" name="Ten" value="<?php echo $Ten ?>">
          </div>
          <br>
          <div class="form-group">
            <label class="form-control-label">Mô tả</label>
            <textarea class="form-control" style="width:300px;" name="Mota"><?php echo $Mota ?></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" name="update">SAVE</button>
      </form>
    </div>
    <!-- End Content -->
  </div>
</div>