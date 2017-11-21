<?php
    $doc = new DOMDocument('1.0','UTF-8');
    $doc->formatOutput = true;
    $doc->preserveWhiteSpace = false;
    $doc->load('data/invoices.xml');
    $doc = simplexml_load_file('data/invoices.xml');
    if(count($doc->invoice)==0){
        $CountId=1;
    }
    else
    {
        foreach($doc->invoice as $invoice){ 
            echo "<br>";
        }
        echo $CountId=$invoice->ID+1;    
    }
?>