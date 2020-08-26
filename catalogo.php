<?php 

session_start();

include_once './funciones/cFunciones.php';

error_reporting(0); 

$catalogo_get= fnGetCatalogos();

?>


<!DOCTYPE html>
<html lang="en">
    
    <?php include './nav/cabecera.php'; ?>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php include './nav/nav_prin.php'; ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 text-center">
                    <h3 style="padding-top: 10px;">Catalogos</h3>
                    <hr class="hr_p">
                </div>
            </div>           
        </div>


        <div class="container col-md-12 text-center">
            <div class="col-md-4 col-sm-12 col-xs-12 text-center"></div>

            <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                <div class="row">
                    <a href="#busquedas" class="btn btn-info" data-toggle="collapse">Ver en Linea</a>

                    <div id="busquedas" class="collapse"><br>

                        <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                            <a style="font-size: 11px" href="https://online.flippingbook.com/view/925396/" target="_blank">
                                <button class="btn btn-danger" style="font-size: 9px"><b>Catalogo 1</b>
                                </button>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                            <a style="font-size: 11px" href="http://promocionalesweb.com/CATALOGO_PROMOCIONALES_2020_2021/index.html#I" target="_blank">
                                <button class="btn btn-danger" style="font-size: 9px"><b>Catalogo 3</b>
                                </button>
                            </a>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row"><br>

            <?php foreach ($catalogo_get as $k => $v):?>

                <article class="col-md-3 col-sm-6 col-xs-6" style="padding: 1px 1px 1px;" >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 text-center">
                            <a style="font-size: 11px " href="./<?php print $v['url'] ?>" download="<?php print $v['nombre']?>.pdf">
                                <img src="ser_img/magazine.png" height="100px;"><br>
                            </a>
                            <div class=" col-sm-12 col-md-12 col-xs-12 text-center">
                                <p><b style="font-size: 11px "><?php echo ($v['nombre']);?></b></p>
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 text-center">
                            <a style="font-size: 11px" href="./<?php print $v['url'] ?>" download="<?php print $v['nombre']?>.pdf">
                                <button class="btn btn-default" style="background-color:#3c3c3c; color: white">Descargar
                                </button>
                            </a>
                        </div>
                    </div>
                    <br>
                </article>

            <?php endforeach;?>
        </div>
    </div> 

    <p style="padding-top: 100px;">

        <?php include './nav/footer.php'; ?>
        <?php include './nav/scripts.php'; ?>
    </body>
</html>


