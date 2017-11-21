<?php 
    $doc = simplexml_load_file('../data/invoices.xml');
    // Get input
    foreach($doc->invoice as $invoice){
        if($invoice->ID==$_GET['id']){
            $tenKH = $invoice->tenKH;
            echo $tenKH;
            foreach($invoice->product as $product){
                echo $product->id;
                /*
                <id>HH03</id>
      <ten>6006U</ten>
      <hang>HP</hang>
      <qty>3</qty>
      <gia>13000000</gia>
      <thanhtien>39000000</thanhtien>
                */
            }
            break;
        }
    }
?>