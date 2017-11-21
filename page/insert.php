<?php
$isExist = true;
$isNull = false;
if(isset($_POST['insert'])){
    // require '../product.php';
    // require 'product.php';
    $doc = simplexml_load_file('../data/pc-laptop.xml');
    foreach($doc->pc as $pc){
        if($pc->id==$_POST['Id']){
            $messageM = "Mã hàng hóa đã bị trùng";
            $isExist = false;
            break;
        }
    }
    if($_POST['Id']==null||$_POST['Ten']==null||$_POST['CPU']==null||$_POST['CD']==null||$_POST['Gia']==null){
        if($_POST['Id']==null)
        $messageID = "Chưa điền vào ID !";
        if($_POST['Ten']==null)
        $messageTen = "Chưa điền vào Tên !";
        if($_POST['CPU']==null)
        $messageCPU = "Chưa điền vào tốc độ CPU !";
        if($_POST['CD']==null)
        $messageCD = "Chưa điền vào loại ổ đĩa !";
        if($_POST['Gia']==null)
        $messageGia = "Chưa điền vào Giá !";
        $isNull=true;
    }
    if($isExist==true&&$isNull==false){
        $doc = new DOMDocument('1.0','UTF-8');
        $doc->formatOutput = true;
        $doc->preserveWhiteSpace = false;
        $doc->load('../data/pc-laptop.xml');
        $pc = $doc->getElementsByTagName("pc");
    
        $Id = $_POST['Id'];
        $Ten = $_POST['Ten'];
        $Hang = $_POST['Hang'];
        // $Image = $_POST['Image'];
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
        // End image upload
        $Chip = $_POST['Chip'];
        $CPU = $_POST['CPU'];
        $CD = $_POST['CD'];
        $Gia = $_POST['Gia'];
        
        $rootTag = $doc->getElementsByTagName("product")->item(0);
        $productTag = $doc->createElement("pc");
            $IdTag = $doc->createElement("id",$Id);
            $TenTag = $doc->createElement("ten",$Ten);
            $HangTag = $doc->createElement("hang",$Hang);
            $ImageTag = $doc->createElement("image",$Image);
            $ChipTag = $doc->createElement("chipset",$Chip);
            $CPUTag = $doc->createElement("cpu",$CPU);
            $CDTag = $doc->createElement("cd",$CD);       
            $GiaTag = $doc->createElement("gia",$Gia);  
            
        $productTag->appendChild($IdTag);
        $productTag->appendChild($TenTag);
        $productTag->appendChild($HangTag);
        $productTag->appendChild($ImageTag);
        $productTag->appendChild($ChipTag);
        $productTag->appendChild($CPUTag);
        $productTag->appendChild($CDTag);
        $productTag->appendChild($GiaTag);
    
        $rootTag->appendChild($productTag);
       
        // $doc->save('data/pc-laptop.xml');
        $doc->save('../data/pc-laptop.xml');
        // header('location:../index.php');
        header('location:admin.php');
    }
    //
}  
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Thêm SP</a>
            </li>
        </ol>
        <!-- Content -->
        <div class="card-body">
            <form method="POST" action="admin.php?p=insert" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-control-label">Mã Hàng Hóa</label>
                    <?php if(isset($messageM)){ echo "<br><div style='color:red;'>".$messageM."</div>";} ?>
                    <?php if(isset($messageID)){ echo "<br><div style='color:red;'>".$messageID."</div>";} ?>
                    <input type="text" class="form-control" style="width:300px;"
                    name="Id" value="<?php if(isset($_POST['Id'])){echo $_POST['Id'];} ?>">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tên Hàng Hóa</label>
                    <?php if(isset($messageTen)){ echo "<br><div style='color:red;'>".$messageTen."</div>";} ?>
                    <input type="text" class="form-control" style="width:300px;" name="Ten"
                    value="<?php if(isset($_POST['Ten'])){echo $_POST['Ten'];} ?>"
                    >
                </div>
                <div class="form-group">
                    <label class="form-control-lab-el">Hãng SX</label>
                    <select class="form-control" style="width:300px;" name="Hang">
                        <?php
                            $dproduct = new DOMDocument();
                            $dproduct->load('../data/production.xml');
                            $hang = $dproduct->getElementsByTagName("hang");
                            foreach($hang as $item){
                                $tagTenHang=$item->getElementsByTagName("ten");
                                $TenHang=$tagTenHang->item(0)->nodeValue;
                        ?>
                        <option>
                            <?php echo $TenHang; ?>
                        </option>
                        <?php }?>
                    </select>
                    <!-- <input type="text" class="form-control" style="width:300px;" name="Hang"> -->
                </div>
                <div class="form-group">
                    <label class="form-control-label">Image</label>
                    <!-- <input type="text" class="form-control" style="width:300px;" name="Image"> -->
                    <input type="file" class="form-control" style="width:300px;" name="Image">
                </div>
                <div class="form-group">
                    <label class="form-control-label">ChipSet</label>
                    <!-- <input type="text" class="form-control" style="width:300px;" name="Chip"> -->
                    <select class="form-control" style="width:300px;" name="Chip">
                        <?php
                            $dchip = new DOMDocument();
                            $dchip->load('../data/cpu.xml');
                            $hangchip = $dchip->getElementsByTagName("hang");
                            foreach($hangchip as $ichip){
                                $tagTenHang=$ichip->getElementsByTagName("ten");
                                $TenHang=$tagTenHang->item(0)->nodeValue;
                        ?>
                        <option>
                            <?php echo $TenHang; ?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tốc Độ CPU</label>
                    <?php if(isset($messageCPU)){ echo "<br><div style='color:red;'>".$messageCPU."</div>";} ?>
                    <input type="text" class="form-control" style="width:300px;" name="CPU"
                    value="<?php if(isset($_POST['CPU'])){echo $_POST['CPU'];} ?>"
                    >
                </div>
                <div class="form-group">
                    <label class="form-control-label">Loại ổ Đĩa</label>
                    <?php if(isset($messageCD)){ echo "<br><div style='color:red;'>".$messageCD."</div>";} ?>
                    <input type="text" class="form-control" style="width:300px;" name="CD"
                    value="<?php if(isset($_POST['CD'])){echo $_POST['CD'];} ?>"
                    >
                </div>
                <div class="form-group">
                    <label class="form-control-label">Giá</label>
                    <?php if(isset($messageGia)){ echo "<br><div style='color:red;'>".$messageGia."</div>";} ?>
                    <input type="text" class="form-control" style="width:300px;" name="Gia"
                    value="<?php if(isset($_POST['Gia'])){echo $_POST['Gia'];} ?>"
                    >
                </div>
                <button type="submit" class="btn btn-primary" name="insert">ADD</button>
            </form>
        </div>
        <!-- End Content -->
    </div>
</div>