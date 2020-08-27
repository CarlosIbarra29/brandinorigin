<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

    <?php include './nav/cabecera.php'; ?>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" style="padding-top: 30px">

        <?php include './nav/nav_prin.php'; ?>

        <div class="container" >

        	<div class="col-sm-3"></div>
        	<div class="col-sm-6">

		        <form id="login-form" action="php/recuperar.php" method="post" role="form" style="display: block; padding-top: 50px;">

		            <?php if(isset($_GET['msj'])):?>

		                <?php if ($_GET['status']==="1"):?>

		                     <div class="alert alert-success alert-dismissible">

		                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

		                        <strong><?php print_r($_GET['msj']); ?></strong>

		                    </div>

		                <?php else:?>

		                    <div class="alert alert-danger alert-dismissible">

		                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

		                        <strong><?php print_r($_GET['msj']); ?></strong>

		                    </div>

		                <?php endif;?>

		            <?php endif;?>

		            <div class="form-group">
		                <input type="email" name="username" id="username" tabindex="1" class="form-control" placeholder="Correo" value="" required="">
		            </div>

		            <div class="form-group">
		                <div class="row">
		                    <div class="col-sm-6 col-sm-offset-3">
		                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Recuperar Passsword">
		                    </div>
		                </div>
		            </div>

		        </form>

        	</div>	
        
        </div>

        <div class="container" style="padding-top: 120px;"></div>

        <?php include './nav/footer.php'; ?>


        <?php include './nav/scripts.php'; ?>
    </body>
</html>
  