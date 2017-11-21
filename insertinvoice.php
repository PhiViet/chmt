<?php include 'countInvoice.php' ?>
<?php 
    if(isset($_SESSION['cart']) && $_SESSION['cart']!=null){
    //session_start();
    $doc = new DOMDocument('1.0','UTF-8');
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = false;
    $doc->load('data/invoices.xml');
    

    $IdInvoice = $CountId;
    $TenKH = $_SESSION['TenKH'];
    $SDT = $_SESSION['SDT'];
    
    $rootTag = $doc->getElementsByTagName("invoices")->item(0);
    $invoiceTag = $doc->createElement("invoice");
    $IdInvoiceTag = $doc->createElement("ID",$IdInvoice);
    $TenKHTag = $doc->createElement("tenKH",$TenKH);
    $SDTTag = $doc->createElement("SDT",$SDT);

    $invoiceTag->appendChild($IdInvoiceTag); 
    $invoiceTag->appendChild($TenKHTag);
    $invoiceTag->appendChild($SDTTag);

    foreach($_SESSION['cart'] as $list){
        //echo $list['id'];
        //$IdInvoiceTag = $doc->createElement("id",);
        $productTag = $doc->createElement("product");
        $IdTag = $doc->createElement("id",$list['id']);
        $TenTag = $doc->createElement("ten",$list['ten']);
        $HangTag = $doc->createElement("hang",$list['hang']);
        $QtyTag = $doc->createElement("qty",$list['qty']);
        $GiaTag = $doc->createElement("gia",$list['gia']);
        $ThanhTienTag=$doc->createElement("thanhtien",$list['qty']*$list['gia']);

        $productTag->appendChild($IdTag);
        $productTag->appendChild($TenTag);
        $productTag->appendChild($HangTag);
        $productTag->appendChild($QtyTag);
        $productTag->appendChild($GiaTag);
        $productTag->appendChild($ThanhTienTag);

        //$invoiceTag->appendChild($IdInvoiceTag);
        $invoiceTag->appendChild($productTag);
        $rootTag->appendChild($invoiceTag);
        $doc->save('data/invoices.xml');
    }
    }
    echo "<h4>Đơn hàng của bạn đã được gửi đi, </br>
          Cảm ơn bạn , Cửa hàng sẽ liên hệ cho bạn sớm nhất có thể !! </h4>";
    unset($_SESSION['cart']);
    
?>