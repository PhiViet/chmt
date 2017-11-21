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