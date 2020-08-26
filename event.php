<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
    <?php include './nav/cabecera.php'; ?>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php include './nav/nav_prin.php'; ?>


        <div id="about" class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Event Marketing</h2>
                    <hr class="hr_p">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Ideas creativas transformadas en experiencias reales,
                        logramos una interacción con el consumidor de tal forma que éste tenga una recordación de marca permanente.</h4>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-4 ">
                    <h3>ACTIVACIONES</h3>
                    <p><span class="glyphicon glyphicon-ok-circle"></span> Implementamos campañas de alto impacto, reflejadas en acciones de comunicación estratégicas.</p>
                </div>
                <div class="col-sm-4 slide text-center">
                    <p>
                        <img src="img_3a/power-marketing.png" height="300px;" class="img-responsive">
                    </p>
                </div>
                <div class="col-sm-4 ">  
                    <h3>EVENTOS</h3>
                    <p><span class="glyphicon glyphicon-ok-circle"></span> Transformamos ideas en historias reales con un desarrollo creativo y estratégico.</p>
                </div>
            </div>

        </div>



        <?php include './nav/footer.php'; ?>
        <?php include './nav/scripts.php'; ?>
    </body>
</html>
