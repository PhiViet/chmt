<?php
  //delete
  if(isset($_GET['id'])){
    // $pc = simplexml_load_file('data/pc-laptop.xml');
    $id = $_GET['id'];
    //
    $doc = new DOMDocument();
    $doc->load('../data/pc-laptop.xml');
    $xpath = new DOMXPath($doc);
    foreach( $xpath->query("/product/pc[id='$id']") as $node) {
        $node->parentNode->removeChild($node);
    }
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = true;
    $doc->save('../data/pc-laptop.xml'); 
    //header('location:admin.php');
  }
?>
<?php 
    $doc = new DOMDocument();
    $doc->load('../data/pc-laptop.xml');
    $pc = $doc->getElementsByTagName("pc");
    foreach($pc as $item){
        $tagId=$item->getElementsByTagName("id");
        $Id = $tagId->item(0)->nodeValue;

        $tagTen=$item->getElementsByTagName("ten");
        $Ten=$tagTen->item(0)->nodeValue;

        $tagHang=$item->getElementsByTagName("hang");
        $Hang=$tagHang->item(0)->nodeValue;

        $tagImage=$item->getElementsByTagName("image");
        $Image=$tagImage->item(0)->nodeValue;

        $tagChip=$item->getElementsByTagName("chipset");
        $Chip=$tagChip->item(0)->nodeValue;

        $tagCPU=$item->getElementsByTagName("cpu");
        $CPU=$tagCPU->item(0)->nodeValue;

        $tagCD=$item->getElementsByTagName("cd");
        $CD=$tagCD->item(0)->nodeValue;

        $tagGia=$item->getElementsByTagName("gia");
        $Gia=$tagGia->item(0)->nodeValue;
?>
  <tr>
    <td>
      <?php echo $Id ?>
    </td>
    <td>
      <?php echo $Ten?>
    </td>
    <td>
      <?php echo $Hang?>
    </td>
    <td>
      <img src="../data/image/<?php echo $Image?>" width="130px" height="70px" alt="">
    </td>
    <td>
      <?php echo $Chip?>
    </td>
    <td>
      <?php echo $CPU?>
    </td>
    <td>
      <?php echo $CD?>
    </td>
    <td>
      <?php echo $Gia?>
    </td>
    <!-- <a href="index.php?p=them">Add New</a> -->
    <td>
      <!-- <button class="fa fa-trash"></button> -->
      <a href="admin.php?p=update&edit=<?php echo $Id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      <a href="admin.php?id=<?php echo $Id?>" onclick="return confirm('Bạn có muốn xóa hàng hóa <?php echo $Id?>?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
      <!-- <button name="Insert" class="fa fa-pencil" data-toggle="modal" data-target="#myModal"></button> -->
  </td>
  </tr>
<?php }?>