<?php
error_reporting(0);
ini_set("memory_limit","100M");
ini_set("max_execution_time",3600);
// Script para test de Instagram
include 'contacts.php';
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta description="Mi sitio" />
        <title>Instagram</title>
        <link rel="stylesheet" type="text/css" media="all" href="estilos.css" /> 
    </head>
	<body>
		<header>
		</header>
		<section>
			<?php
			for ($i=0; $i < count($friends); $i++) { 
				$json = 'https://www.instagram.com/'.$friends[$i].'/media/';
				$contents = file_get_contents($json);
				$obj = json_decode($contents);
				if(!$obj->items[0] || !isset($obj->items[0]) || $obj->items[0]==null){
					$profile_picture='notfound.png';
					$profile_name='&nbsp;';
				} else {
					$datos = $obj->items[0]->user;
					$profile_picture=$datos->profile_picture;
					$profile_name=$datos->username;
				}
				if($i>=50){$i=count($friends);}
				?>
			<article>
				<IMG SRC="<?=$profile_picture;?>">
				<p><?=$profile_name;?></p>
			</article>
			<?php
			}
			?>
		</section>
		<footer>
		</footer>
	</body>
</html>