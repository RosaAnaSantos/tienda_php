<?php

include '../conexion.php';


echo"$nombre $apellidos<br>";

if(isset($_POST['enviar']))
{
	$clave=$_POST['clave'];
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$fabricante=$_POST['fabricante'];
	
	
	$hoy = date("Y-m-d"); 
	
	$insert="INSERT INTO articulos 
	VALUES($clave,'$nombre','$precio','$fabricante','$login','$hoy')";
	$result=mysqli_query($link,$insert);
}

$consulta="SELECT MAX(clave_articulo) AS mayor 
FROM articulos";
$resultado=mysqli_query($link,$consulta);
if($row=mysqli_fetch_array($resultado))
{
	$clave_articulo=$row['mayor'];
	$clave_articulo=$clave_articulo+1;
}	
	

?>
<form action="alta_articulo.php" method="post">

<input type="hidden" name="clave" value="<?=$clave_articulo?>" />



<br />
Nombre articulo:
<input type="text" name="nombre"/>
<br />
Precio:
<input type="text" name="precio"/>
<br />

Fabricante:
<select name="fabricante">
<option value="N" selected="selected">Selecciona fabricante...</option>

<?php
$cont=0;
$consulta="SELECT nombre,clave_fabricante
FROM fabricantes";
$resultado=mysqli_query($link,$consulta);
while($row=mysqli_fetch_array($resultado))
{
	$nombre=$row['nombre'];
	$clave_fabricante=$row['clave_fabricante'];
	?>
    <option value="<?=$clave_fabricante?>"><?=$cont?>) <?=$nombre?></option><?php
	$cont++;
}	
?>
</select>

<br />

<input type="submit" value="Grabar" name="enviar" />
</form>

<p align="center"><a href="/programacion/tienda/index.php"><img src="/programacion/tienda/imagenes/volver.png" width="50" height="45" /> </a></p>
