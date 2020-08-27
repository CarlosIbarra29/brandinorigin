<?php session_start()?>


<!DOCTYPE html>
<html lang="en">

    <?php include './nav/cabecera.php'; ?>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" style="padding-top: 30px">

        <?php include './nav/nav_prin.php'; ?>

        <?php if(isset($_SESSION['usuario']))?>

        <table>
        	


        </table>

        <?php else:?>

        <?php endif; ?>

        <div class="container" >

        	<div class="col-sm-3"></div>
        	<div class="col-sm-6">

        	</div>	
        
        </div>

        <div class="container" style="padding-top: 120px;"></div>

        <?php include './nav/footer.php'; ?>


        <?php include './nav/scripts.php'; ?>
    </body>
</html>
  