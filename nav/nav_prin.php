<?php 

    $_SESSION['nombre']; 
    $_SESSION['usuario'];
    $_SESSION['user_login_status'];

    error_reporting(0);

?>


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

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#myPage"><img src="./logos/logo_3a.png" alt="logo" title="3a" height="35px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./nosotros.php">Nosotros</a></li>
                <li><a href="./productos.php?productos=ALL">Productos</a></li>
                <li><a href="./productos.php?categoria=SALUD">Aticulos Covid-19</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a style="font-size: 11px" href="./event.php">Event Marketing</a></li>
                        <li><a style="font-size: 11px" href="./impresiones.php">Impresiones</a></li>
                        <li><a style="font-size: 11px" href="./stands.php">Stands</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catálogos
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a style="font-size: 11px" href="./catalogo.php">Productos</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if (isset($_SESSION['usuario'])):?>

                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php print  strtoupper ($_SESSION['usuario']);?></a></li>

                    <li><a href="./php/VerCarta.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ver cotización (<?php print $_SESSION['num_articulos'] ?>)</a></li>

                    <li><a href="./php/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerra Sesion</a></li>

                <?php else:?>

                    <li><a href="./registro.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
                
                <?php endif;?>  

                </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <img src="logos/logo_3a.png" alt="logo" title="3a" class="logo">
    <h1 style="font-size: 12px;">La forma más rápida y fácil de comprar promocionales.</h1>
    <form method="get" action="./productos.php" class="text-center">
        <div class="col-sm-12">
            <input type="text" class="form-control" style="border-radius: 50px;" required="" name="palabra_clave" id="coding_language" placeholder="¿Qué estás buscando...?">
            <span class="glyphicon glyphicon-search form-control-feedback" style="padding-right: 40px; color: #3c3c3c;"></span>
        </div>
    </form>
</div>
<br><br>
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
            <a href="https://twitter.com/"><img src="./redes_sociales/gorjeo.png" height="27px;" alt="twi" title="twitter"> </a> 
            <a href="https://www.facebook.com/"><img src="./redes_sociales/facebook.png" height="27px;" alt="fb" title="facebokk"> </a>
            <a href="https://www.instagram.com"><img src="./redes_sociales/linkedin.png" height="25px;" alt="ins" title="insta"></a> 
        </div>
    </div>
</div>

