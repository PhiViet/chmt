<div class="content-wrapper">
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="admin.php?p=chipset">Chipset</a>
    </li>
    <!-- <li class="breadcrumb-item active">PC</li> -->
  </ol>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>
              <a href="admin.php?p=insertchipset">
              <i class="fa fa-plus-square" aria-hidden="true"> ADD</i>
              </a>
            </th>
          </tr>
        </thead>
      <?php
  //delete
  if(isset($_GET['id'])){
    // $pc = simplexml_load_file('data/pc-laptop.xml');
    $id = $_GET['id'];
    //
    $doc = new DOMDocument();
    $doc->load('../data/cpu.xml');
    $xpath = new DOMXPath($doc);
    // foreach( $xpath->query("/product/pc[id='$id']") as $node) {
        // $node->parentNode->removeChild($node);
    // }
    foreach( $xpath->query("/cpu/hang[id='$id']") as $node) {
        $node->parentNode->removeChild($node);
    }
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = true;
    $doc->save('../data/cpu.xml'); 
    //header('location:admin.php');
  }
?>
<?php 
    $d = new DOMDocument();
    $d->load('../data/cpu.xml');
    $hang = $d->getElementsByTagName("hang");
    foreach($hang as $item){
        $tagId=$item->getElementsByTagName("id");
        $Id = $tagId->item(0)->nodeValue;

        $tagTen=$item->getElementsByTagName("ten");
        $Ten=$tagTen->item(0)->nodeValue;

        $tagMota=$item->getElementsByTagName("mota");
        $Mota=$tagMota->item(0)->nodeValue;
?>
  <tr>
    <td>
      <?php echo $Id ?>
    </td>
    <td>
      <?php echo $Ten?>
    </td>
    <td>
      <?php echo $Mota?>
    </td>
    <!-- <a href="index.php?p=them">Add New</a> -->
    <td>
      <!-- <button class="fa fa-trash"></button> -->
      <a href="admin.php?p=updatechipset&edit=<?php echo $Id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      <a href="admin.php?p=chipset&id=<?php echo $Id?>" onclick="return confirm('Bạn có muốn xóa hãng sx <?php echo $Id?>?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
      <!-- <button name="Insert" class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></button> -->
  </td>
  </tr>
<?php }?>
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