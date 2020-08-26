<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">


    <head>

        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-NZ6GPZD');
        </script>


        <!-- End Google Tag Manager -->



        <meta name="description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta name="robots" content="INDEX,FOLLOW" />
        <meta name="keywords" content="venta de articulos promocionales, Articulos promocionales, regalos corporativos,promocionales, promocionales df, regalos promocionales, articulos publicitarios, productos promocionales, articulos publicidad, publicidad de productos, merchandising">

        <title>Articulos Promocionales | 3A Branding Group | Servicio, Calidad y Precio</title>
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Articulos Promocionales | 3A Branding Group | Servicio, Calidad y Precio" />
        <meta property="og:description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta property="og:url" content="http://3abranding.com/" />
        <meta property="og:site_name" content="3A BRANDING GROUP" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="Artículos promocionales, tazas, cilindros, termos, boligrafos, bolsos, mochilas promocionales  ajustamos cualquier presupuesto de la competencia" />
        <meta name="twitter:title" content="Articulos Promocionales | 3A Branding Group | Servicio, Calidad y PreciO" />
        <meta property="og:image" content="http://3abranding.com.mx/logos/logo_3a.png" />




        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta http-equiv="cache-control" content="CACHE">
        <meta http-equiv="content-language" content="es">
        <meta name="google-site-verification" content="Psjonsr89EWkRTt464WNkntySMaSrUonBbetfSNswfE" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />



        <link rel="shortcut icon" href="logos/logo_3a.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="csc/global.css">
        <link rel="stylesheet" href="csc/jquery-ui.css">
        <link rel="stylesheet" href="csc/css_whats.css">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152042099-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-152042099-1');
        </script>





    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ6GPZD"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php include './nav/nav_prin.php'; ?>

        <?php include './php/productos_consulta.php';?>

        <!--<a href="productos.php"><img src="promos/ban.png" class="img-responsive slide" alt="banner" title="banner"></a>-->
      
        
        <?php include './nav/footer.php'; ?>

        <?php include './nav/scripts.php'; ?>
    </body>
</html>
