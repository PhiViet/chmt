<?php
    session_start();
    $_SESSION['cart'];
    if(isset($_POST['btnUpdate']))
    {
        foreach($_POST['qty'] as $key=>$val){
                for($i=0; $i<count($_SESSION['cart']) ;$i++){
                   
                    if($_SESSION['cart'][$i]['id']==$key)
                    {
                        if($val<=0)
                        {
                            array_splice($_SESSION['cart'], $i, 1);
                        }
                        else
                        {
                            if($_SESSION['cart'][$i]['id']==$key)
                            {
                                $_SESSION['cart'][$i]['qty']=$val;
                            }
                        }
                    }
                }
            }
    }
    header("location:index.php?p=giohang")
?>