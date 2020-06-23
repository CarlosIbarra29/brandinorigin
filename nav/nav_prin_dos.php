<script>
    $('.dropdown-toggle').click(function (e) {
        if ($(document).width() > 768) {
            e.preventDefault();

            var url = $(this).attr('href');


            if (url !== '#') {

                window.location.href = url;
            }

        }
    });
</script>

<style>
    @media only screen and (min-width: 768px) {
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    }
</style>

<?php
include './php/session_start.php';

$articulos = $_GET['num_ar'];
$us= $_GET['us'];
?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#myPage"><img src="./logos/logo_3a.png" height="35px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="./index.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Inicio</a></li>
                <li><a href="./nosotros.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Nosotros</a></li>
                <li><a href="./productos.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Productos</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a style="font-size: 11px" href="./event.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Event Marketing</a></li>
                        <li><a style="font-size: 11px" href="./impresiones.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Impresiones</a></li>
                        <li><a style="font-size: 11px" href="./stands.php?num_ar=<?php echo $articulos ?>&us=<?php echo $us ?>">Stands</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catálogos
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a style="font-size: 11px" href="./catalogos/cat.pdf?num_ar=<?php echo $articulos ?>" download="Catálogo 3A Branding.pdf">Productos 2019</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./php/VerCarta.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ver cotización(<?php echo $articulos ?>)
                    <?php
                if ($us==""){
                    
                }else{
                    echo '- Bienvenido '.$us;
                    ?>
                        <li><a href="./php/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerra Session</a></li>
                        <?php
                }
                ?>
                    
                    </a></li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <img src="logos/logo_3a.png" class="logo">
    <h6>La forma más rápida y fácil de comprar promocionales.</h6>
</div>


<!-- Container (About Section) -->
<div id="" class="container-fluid barra_menu">
    <div class="row">
        <div class="col-sm-4 text-center contenido_barra">
            <span class="glyphicon glyphicon-envelope"></span> contacto@3abranding.com
        </div>
        <div class="col-sm-4 text-center contenido_barra">
            <span class="glyphicon glyphicon-phone-alt"></span> <a style="color: #fff;"> 55 7090 8638</a> o <a style="color: white;">55 7090 8639</a>
        </div>
        <div class="col-sm-4 text-center contenido_barra">
            <a href="https://twitter.com/"><img src="./redes_sociales/gorjeo.png" height="27px;"> </a> 
            <a href="https://www.facebook.com/"><img src="./redes_sociales/facebook.png" height="27px;"> </a>
            <a href="https://www.instagram.com"><img src="./redes_sociales/linkedin.png" height="25px;"></a> 
        </div>
    </div>
</div>
