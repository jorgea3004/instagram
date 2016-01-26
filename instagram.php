<?php
error_reporting(0);
ini_set("memory_limit","100M");
ini_set("max_execution_time",3600);
// Script para test de Instagram
//include 'contacts.php';
$friends[]='bunny.lukkaew';
for ($i=0; $i < count($friends); $i++) { 
	$json = 'https://www.instagram.com/'.$friends[$i].'/media/';
	$contents = file_get_contents($json);
	$obj = json_decode($contents);
	if(!$obj->items[0] || !isset($obj->items[0]) || $obj->items[0]==null){
		//echo "Falla: " . $friends[$i]; exit();
		$profile_picture='notfound.png';
	} else {
		$datos = $obj->items[0]->user;
		$profile_picture=$datos->profile_picture;
	}
	echo "<img src='" . $profile_picture . "'/><br>";
	/*foreach ($obj->items as $key => $value) {
		//echo "" . $key . " -> " .$value. "<br>";
		foreach ($value as $key2 => $value2) {
			echo "" . $key2 . "<br>";
		}
	}*/
	for ($i=0; $i < count($obj->items); $i++) { 
		echo "<img src='" . $obj->items[$i]->images->thumbnail->url. "' w/>";
	}
}

?>