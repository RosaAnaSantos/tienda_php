<?php



function conectar_bd()
{
	$link=mysqli_connect('localhost','root','','tienda_infor_tarde') or die(mysqli_error());
	
	return $link;
}



function rara($var1,$var2)
{
	if($var1<$var2)
	{
		$total=$var1+$var2;
	}
	else
	{
		$total=$var1-$var2;
	}
	
	return $total;
}


function monitor()
{
	echo"me ha llamado la funcion monitor<br>";	
}

function resta($var1,$var2)
{
	
		$total=$var1-$var2;
	
	
	return $total;
}



?>