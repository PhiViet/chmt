<?php 
if(isset($_POST['insert'])){
    $doc = new DOMDocument('1.0','UTF-8');
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = false;
    $doc->load('../data/production.xml');
    $hang = $doc->getElementsByTagName("hang");

    $Id = $_POST['Id'];
    $Ten = $_POST['Ten'];
    $Mota = $_POST['Mota'];
    $rootTag = $doc->getElementsByTagName("production")->item(0);
    $productionTag = $doc->createElement("hang");
        $IdTag = $doc->createElement("id",$Id);
        $TenTag = $doc->createElement("ten",$Ten);
        $MotaTag = $doc->createElement("mota",$Mota); 
        
    $productionTag->appendChild($IdTag);
    $productionTag->appendChild($TenTag);
    $productionTag->appendChild($MotaTag);
    $rootTag->appendChild($productionTag);
   
    $doc->save('../data/production.xml');
    header('location:admin.php?p=production');        
    
}  
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Thêm Hãng SX</a>
            </li>
        </ol>
        <!-- Content -->
        <div class="card-body">
            <form method="POST" action="insertproduction.php">
                <div class="form-group">
                    <label class="form-control-label">Mã NSX</label>
                    <input type="text" class="form-control" style="width:300px;" name="Id">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Tên</label>
                    <input type="text" class="form-control" style="width:300px;" name="Ten">
                </div>
                <div class="form-group">
                    <label class="form-control-label">Mô tả</label>
                    <textarea class="form-control" style="width:300px;" name="Mota"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="insert">ADD</button>
            </form>
        </div>
        <!-- End Content -->
    </div>
</div>