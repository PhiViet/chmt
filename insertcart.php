<?php
    session_start();
    $isExist=false;
    // $idProduct = $_GET['id'];
    $newProduct = array();
    $doc = simplexml_load_file('data/pc-laptop.xml');
    // Get input
    foreach($doc->pc as $pc){
        if($pc->id==$_GET['id']){
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
    echo "<pre>";
    if(!isset($_SESSION['cart'])||$_SESSION['cart']==null){
        $newProduct[] = array(
            "id"=>"".$Id."",
            "ten"=>"".$Ten."",
            "hang"=>"".$Hang."",
            "qty"=>1,
            "gia"=>"".$Gia.""
        );
        // $newProduct[0]['qty']=1;
        $_SESSION['cart'][0]=$newProduct[0];
    }
    else
    {
        echo "Tổng số lượng ".count($_SESSION['cart'])."<hr>";
        for($i=0; $i<count($_SESSION['cart']) ;$i++){
            if($_SESSION['cart'][$i]['id']==$Id){
                $isExist = true;
                $_SESSION['cart'][$i]['qty']+=1;
                break;
            }
        }
        if($isExist==false){
            $_SESSION['cart'][count($_SESSION['cart'])]=$newProduct[] = array(
                "id"=>"".$Id."",
                "ten"=>"".$Ten."",
                "hang"=>"".$Hang."",
                "qty"=>1,
                "gia"=>"".$Gia.""
            );
        } 
    }
    for($i=0;$i<count($_SESSION['cart']);$i++){
        print_r( $_SESSION['cart'][$i]);
    }
    header("location:index.php");
?>
