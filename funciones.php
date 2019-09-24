<?php


function conectar_bd()
{
	$link=mysqli_connect('localhost','root','','tienda_infor_tarde') or die(mysqli_error());
	return $link;
}


?>