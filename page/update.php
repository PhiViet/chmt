<?php 
    //require 'product.php';
    $doc = simplexml_load_file('../data/pc-laptop.xml');

    // Get input
    foreach($doc->pc as $pc){
        if($pc->id==$_GET['edit']){
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
    if(isset($_POST['update']))
    {
        var_dump($Image);
        // Post xml
        foreach($doc->pc as $pc){
            if($pc->id==$_POST['Id']){
                 // // $doc->id = $_POST['Id'];
                $pc->ten = $_POST['Ten'];
                $pc->hang = $_POST['Hang'];
                if(empty($_FILES['Image']['name'])){
                    // $pc->image=$Image;
                }
                else{
                    // Image upload
                    $Image= $_FILES['Image']['name'];
                    $extension = strtolower(substr($Image,strpos($Image,'.')+1));
                    $size= $_FILES['Image']['size'];
                    $type= $_FILES['Image']['type'];
                    $max_size = 100000;

                    $tmp_name=$_FILES['Image']['tmp_name'];
                    // $error=$_FILES['file']['error'];
                    if(isset($Image)){
                        if(!empty($Image)){
                            if(($extension=='png'||$extension=='jpg'||$extension=='jpeg')&&$type=='image/jpeg'||$type=='image/png'){
                                $location='../data/image/';
                                if(move_uploaded_file($tmp_name,$location.$Image)){
                                    echo 'Uploaded';
                                }else{
                                    echo 'Error';
                                }
                            }
                            else{
                                echo 'File phải là jpg/jpeg/png';
                            }
                        }
                    }
                    $pc->image=$Image;
                    // End image upload
                }
                //}
                $pc->chipset = $_POST['Chip'];
                $pc->cpu = $_POST['CPU'];
                $pc->cd = $_POST['CD'];        
                $pc->gia = $_POST['Gia'];                
                break;
            }
        }
        file_put_contents('../data/pc-laptop.xml',$doc->asXML());
        header('location:admin.php');        
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
      <form method="POST" action="update.php" enctype="multipart/form-data">
      <div class="form-group">
            <label class="form-control-label">Mã Hàng Hóa</label>
            <input type="text" readonly="" class="form-control" style="width:300px;" name="Id" value="<?php echo $Id ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tên Hàng Hóa</label>
            <input type="text" class="form-control" style="width:300px;" name="Ten" value="<?php echo $Ten ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Hãng SX</label>
            <!-- <input type="text" class="form-control" style="width:300px;" name="Hang" value="<?php //echo $Hang ?>"> -->
            <select class="form-control" style="width:300px;" name="Hang">
                <option><?php echo $Hang ?></option>
                <?php
                            $dproduct = new DOMDocument();
                            $dproduct->load('../data/production.xml');
                            $hang = $dproduct->getElementsByTagName("hang");
                            foreach($hang as $item){
                                $tagTenHang=$item->getElementsByTagName("ten");
                                $TenHang=$tagTenHang->item(0)->nodeValue;
                                if($TenHang!=$Hang)
                                {
                        ?>
                        <option>
                            <?php echo $TenHang;?>
                        </option>
                                <?php }?>
                        <?php }?>
            </select>            
          </div>
          <div class="form-group">
            <label class="form-control-label">Hình Ảnh Minh Họa</label>
            <br>
            <img src="../data/image/<?php echo $Image ?>" width="130px" height="70px" alt="">
            <input type="file" class="form-control" style="width:300px;" name="Image">
          </div>
          <div class="form-group">
            <label class="form-control-label">ChipSet</label>
            <select class="form-control" style="width:300px;" name="Chip">
                <option><?php echo $Chip ?></option>
                <?php
                            $dcpu = new DOMDocument();
                            $dcpu->load('../data/cpu.xml');
                            $hang = $dcpu->getElementsByTagName("hang");
                            foreach($hang as $iChip){
                                $tagTenChip=$iChip->getElementsByTagName("ten");
                                $TenChip=$tagTenChip->item(0)->nodeValue;
                                if($TenChip!=$Chip)
                                {
                        ?>
                        <option>
                            <?php echo $TenChip;?>
                        </option>
                                <?php }?>
                        <?php }?>
            </select>   
            <!-- <input type="text" class="form-control" style="width:300px;" name="Chip" value="<?php echo $Chip ?>"> -->
          </div>
          <div class="form-group">
            <label class="form-control-label">Tốc Độ CPU</label>
            <input type="text" class="form-control" style="width:300px;" name="CPU" value="<?php echo $CPU ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Loại Ổ Đĩa</label>
            <input type="text" class="form-control" style="width:300px;" name="CD" value="<?php echo $CD ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Giá</label>
            <input type="text" class="form-control" style="width:300px;" name="Gia" value="<?php echo $Gia ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="update">SAVE</button>
      </form>
    </div>
    <!-- End Content -->
  </div>
</div>