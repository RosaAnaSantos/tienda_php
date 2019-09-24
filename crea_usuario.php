<?php
session_start();

$link=mysqli_connect('localhost','root','','tienda_infor_tarde')
or die(mysqli_error());


if(isset($_POST['login']) )
{
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$tipo_usuario=$_POST['tipo_usuario'];

	$insert="INSERT INTO usuarios 
	VALUES('$login','$pass','$nombre','$apellidos','$tipo_usuario')";
	$result=mysqli_query($link,$insert);
	
	if($result==TRUE)
	{
		echo"El usuario ha sido insertado correctamente<br>";	
	}
	else
	{
		echo"No ha sido posible insertar<br>";	
	}

}

$clave=100;
?>


<form action="crea_usuario.php" method="post">
Introduce Login:
<input type="text" name="login" />
<br />
Introduce pass
<input type="text" name="pass" />
<br />
Introduce nombre:
<input type="text" name="nombre"/>
<br />
Introduce apellidos:
<input type="text" name="apellidos" />
<br />

<select name="tipo_usuario">
<option value="N">Selecciona una opcion</option>
<option value="user">User</option>
<option value="admin">Administrador</option>
</select>

<input type="submit" value="Grabar" />


</form>

<p align="center"><a href="/programacion/tienda/index.php"><img src="/programacion/tienda/imagenes/volver.png" width="50" height="45" /> </a></p>