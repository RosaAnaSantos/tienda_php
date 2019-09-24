<body bgcolor="#999999">

<?php

if(isset($_GET['funcion']) and isset($_GET['precio']) )
{
	$link=mysqli_connect('localhost','root','','tienda_infor_tarde') or die(mysqli_error());
	
	$funcion=$_GET['funcion'];
	$precio=$_GET['precio'];
	?>
    
     <br /><br /><br /><br />
    <table align="center" border="1">
    <tr align="center" bgcolor="#666666">
    <td>Clave articulo</td>
    <td>Nombre</td>
    <td>Precio</td>
    <td>Clave fabricante</td>
    </tr>
    <?php

	$consulta="SELECT * FROM articulos ";
	//*********************************
	if($funcion=="igual"){$consulta.=" WHERE precio=$precio";}
	//*********************************
	//*********************************
	if($funcion=="distinto"){$consulta.=" WHERE precio<>$precio";}
	//*********************************
	//*********************************
	if($funcion=="menor"){$consulta.=" WHERE precio<$precio";}
	//*********************************
	//*********************************
	if($funcion=="mayor"){$consulta.=" WHERE precio>$precio";}
	//*********************************
	$resultado=mysqli_query($link,$consulta);
	while($row=mysqli_fetch_array($resultado))
	{
		
		$clave_articulo=$row['clave_articulo'];
		$nombre=$row['nombre'];
		$precio=$row['precio'];
		$clave_fabricante=$row['clave_fabricante'];	
		//Ahora cierro php para mostrar los valores de las variables
		?>
		<!-- Muestra una fila de la tabla en cada pasada del bucle -->
		<tr align="center" bgcolor="#FFFFFF">
		<!-- En cada celda imprimo el valor de la variable -->
		<td><?=$clave_articulo?></td>
		<td><?=$nombre?></td>
		<td><?=$precio?></td>
		<td><?=$clave_fabricante?></td>
		</tr>
		<?php
		//Este bucle se va a repetir mientras se cumpla la condicion del select
	}	?>
	</table><?php
}
?>
<br /><br />
<table align="center">
<tr>
<td>
<form name="form1" action="precio_art.php" method="get">
Igual
<input type="radio" name="funcion" checked="checked" value="igual" />
Distinto
<input type="radio" name="funcion" value="distinto" />
menor
<input type="radio" name="funcion" value="menor" />
mayor
<input type="radio" name="funcion" value="mayor" />

<input type="text" name="precio" />
<input type="submit" value="Buscar" name="envio" />
</form>
</td>
</tr>
</table>
<br /><br /><br />
<table align="center">
<tr>
<td><p align="center"><a href="/programacion/tienda/index.php"><img src="/programacion/tienda/imagenes/volver.png" width="50" height="45" /> </a></p>
</td>
</tr>
</table>
</body>