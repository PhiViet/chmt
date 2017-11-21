<div id="carouselExampleIndicators" class="carousel slide my-4" data-interval="3000" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="data/image/slider1.png" style="width:800px;height:300px;" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="data/image/slider2.jpg" style="width:800px;height:300px;" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="data/image/slider3.jpg" style="width:800px;height:300px;" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="row">
    <?php 
        $doc = new DOMDocument();
        $doc->load('data/pc-laptop.xml');
        $pc = $doc->getElementsByTagName("pc");
        foreach($pc as $item){
            $tagId=$item->getElementsByTagName("id");
            $Id = $tagId->item(0)->nodeValue;
            
            $tagTen=$item->getElementsByTagName("ten");
            $Ten=$tagTen->item(0)->nodeValue;

            $tagImage=$item->getElementsByTagName("image");
            $Image=$tagImage->item(0)->nodeValue;


            $tagGia=$item->getElementsByTagName("gia");
            $Gia=$tagGia->item(0)->nodeValue;
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-40">
            <a href="index.php?p=detailproduct&show=<?=$Id?>"><img class="card-img-top" style="padding-top:10px; width:284px;height:150px;" src="data/image/<?php echo $Image ?>" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="index.php?p=detailproduct&show=<?=$Id?>">
                        <?php echo $Ten ?>
                    </a>
                    <a class="fa fa-shopping-cart" href="insertcart.php?id=<?=$Id?>">
                    </a>
                </h4>
                <h5>
                    <?php echo "Giá: ".number_format($Gia,0,".",".");?> vnd
                </h5>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<!-- /.row -->