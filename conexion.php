<?php

//crea una sesion
session_start();

$nuevo=0;

//Aqui solo entra la primera vez que el usuario introduce usuario y contraseña
//compruebo si me envian las variables desde un formulario
if( isset($_GET['login']) && isset($_GET['pass']) )
{
	//Recojo el usuario y la contraseña, la guardo en dos variables
	//lo recojo con estas funciones para que no se pueda entrar a la pagina utilizando este password:   'OR''='
	$login=mysql_real_escape_string($_GET['login']);
	$pass=mysql_real_escape_string($_GET['pass']);
	
	//mysql_real_escape_string
	///////////////////////////////////////////////////////////////
	
	
	//echo"$login $pass<br>";
	
	$nuevo=1;
}

//compruebo si existe la sesión
elseif (isset($_SESSION['login']) and isset($_SESSION['pass']))
{
	$login=$_SESSION['login'];
	$pass=$_SESSION['pass'];
}

else
{	?>
	<a href="login.php">Intentalo otra vez</a>
    <br /><br /><br /><br />
    <?php
	
	//mata la ejecución del codigo (Termina el codigo)
	die("NO has ingresado en el sistema");
}

//conecto con la base de datos para consultar este usuario y contraseña
$link=mysqli_connect('localhost','root','','tienda_infor_tarde') 
or die(mysqli_error());
///////////////////////////////////////////////////////////////////////

//$prueba=" 'OR''=' ";


$consulta="SELECT * FROM usuarios
WHERE login='$login' and pass='$pass' ";


//echo"$consulta<br>";

$resultado=mysqli_query($link,$consulta);
//Si entro en este if es porque ha encontrado el login y la contraseña
if($row=mysqli_fetch_array($resultado))
{
	//Recojo los valores de las columnas: nombre, apellidos y tipo_usuario
	$nombre=$row['nombre'];
	$apellidos=$row['apellidos'];	
	$tipo_usuario=$row['tipo_usuario'];		

	//CREO LAS NUEVAS VARIABLES DE MI SESION//
	$_SESSION['login'] = $login;
	$_SESSION['pass'] = $pass;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellidos'] = $apellidos;
	$_SESSION['tipo_usuario'] = $tipo_usuario;
	//////////////////////////////////////////
	
	if($nuevo==1)
	{
		$hoy = date("Y/m/d H:i:s"); 
				
		$inserta="INSERT INTO control_acceso
		(login,fecha) VALUES('$login','$hoy')";
		$resulta=mysqli_query($link,$inserta);
	}
}	

else
{
	?>
    
	<a href="login.php">Intentalo otra vez</a>
    <?php
	
	die("El usuario $login o el pass $pass no son los correctos");
}


?>