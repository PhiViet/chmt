<?php 
    //require 'product.php';
    $doc = simplexml_load_file('data/pc-laptop.xml');
    // Get input
    foreach($doc->pc as $pc){
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
?>