<?php

error_reporting(0);
include './conexion/conexion2.php';

$sql="SELECT * FROM banners";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		?>
		<div class="item <?php print ' '.$active =$row["item_active"];?>">
			<a href="productos.php"><img src="<?php print $url= $row["url"];?>" class="img-responsive slide" alt="banner" title="banner"></a>
		</div>
		<?php
	}

} else {
	echo "0 results";
}


$conexion->close();

