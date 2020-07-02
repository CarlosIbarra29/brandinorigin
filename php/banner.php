<?php




$banner= fnGetBanners();

foreach ($banner as $key => $value) {

	print $value['url'];
}



/*

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <?php include './php/banner.php';?>


            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


foreach ($banner as $k => $v):?>

	<div class="item <?php print ' '.$active =$v["item_active"];?>">
		<a href="productos.php"><img src="<?php print $url= $v["url"];?>" class="img-responsive slide" alt="banner" title="banner"></a>
	</div>

<?php endforeach;?>

*/

