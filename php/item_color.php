<?php



include '../funciones/cFunciones.php';

$id_img= $_GET['img'];

$imagen = fnGetImg($id_img);

?>



<link rel="stylesheet" href="../csc/global.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style>
    body{
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <img id="largeImage" src="<?php echo $img_g; ?>" width="70%"/>
        <div class="w3-row-padding w3-margin-top" id="thumbs">
            <?php foreach ($imagen as $k => $v): ?>
                <div class="w3-third" style="padding: 1%; cursor: pointer">
                    <div class="w3-card">

                        <img src="<?php print $v['img']; ?>" style="width:80%;"/>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>  
    </div>
</div>

<script>
    $('#thumbs').delegate('img', 'click', function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
</script>





















