<html>
<body>
<?php

include '../conexion.php';

if(isset($_GET['comentario']))
{
	$comentario=$_GET['comentario'];
	$clave=$_GET['clave'];
	$nombre_articulo=$_GET['nombre_articulo'];
	
	$hoy = date("Y/m/d H:i:s"); 
	
	$insert="INSERT INTO comentario_articulo 
	(clave_articulo,comentario,usuario,fecha)
	VALUES($clave,'$comentario','$login','$hoy')";
	$result=mysqli_query($link,$insert);
	
	//Recargo la pagina con 2 variables
	header("location:articulo.php?clave=$clave&nombre_articulo=$nombre_articulo");
	
}



if(isset($_GET['clave']))
{
	$clave=$_GET['clave'];
	$nombre_articulo=$_GET['nombre_articulo'];
}

if(isset($_POST['clave']))
{
	$clave=$_POST['clave'];
	$nombre_articulo=$_POST['nombre_articulo'];
}

////////////////////////////////////////////////////////

//Si el usuario es admin podrá cargar las imagenes
if($tipo_usuario=="admin")
{
	?>
	<form action="articulo.php" method="POST" enctype="multipart/form-data">
		Imagen:
		
		<input type="file" name="imagen" />
		<input type="submit" name="subir" value="Subir"/>
		
		<input type="hidden" name="clave" value="<?=$clave?>">
		<input type="hidden" name="nombre_articulo" value="<?=$nombre_articulo?>">
	</form>
	
	<?php
}
///////////////////////////////////////////////////////////////////////////////


//compruebo que me estan enviando una imagen para guardarla
if (isset($_FILES["imagen"]))
{

	//comprobamos si ha ocurrido un error.
	if ($_FILES["imagen"]["error"] > 0)
	{
		$error=$_FILES["imagen"]["error"];		
		echo "ha ocurrido un error $error";
	} 
	else 
	{
		//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
		//y que el tamano del archivo no exceda los 100kb
		$permitidos=array("audio/mp3","image/jpg", "image/jpeg", "image/gif", "image/png");
		$limite_kb = 10900;
	
		if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
		{
			
			//esta es la ruta donde copiaremos la imagen
			//recuerden que deben crear un directorio con este mismo nombre
			//en el mismo lugar donde se encuentra el archivo subir.php
			$ruta = "imagen_articulo/" . $_FILES['imagen']['name'];
			
			//comprobamos si este archivo existe para no volverlo a copiar.
			//pero si quieren pueden obviar esto si no es necesario.
			//o pueden darle otro nombre para que no sobreescriba el actual.
			if (!file_exists($ruta))
			{
				//aqui movemos el archivo desde la ruta temporal a nuestra ruta
				//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
				//almacenara true o false
				$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
				
				if ($resultado)
				{
					echo "el archivo ha sido movido exitosamente";
					
					
					$insert="INSERT INTO imagenes (ruta,clave_articulo)
					VALUES('$ruta',$clave)";
					$result=mysqli_query($link,$insert);
					
					
				} 
				else 
				{
					echo "ocurrio un error al mover el archivo.";
				}
			} 
			else 
			{
				echo $_FILES['imagen']['name'] . ", este archivo existe";
			}
		} 
		else 
		{
			echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		}
	}
}



$consulta="SELECT a.nombre as articulo,precio,f.nombre as fabrica
FROM articulos as a, fabricantes as f 
WHERE a.clave_fabricante=f.clave_fabricante AND clave_articulo='$clave'";

$resultado=mysqli_query($link,$consulta);
while($row=mysqli_fetch_array($resultado))
{
	$fabrica=$row['fabrica'];
	$precio=$row['precio'];
	$articulo=$row['articulo'];
}


?>


<p align="center"><a href="/programacion/tienda/productos/nom_articulo.php?nombre_articulo=<?=$nombre_articulo?>"><img src="/programacion/tienda/imagenes/volver.png" width="50" height="45" /> </a></p>

<h1 align="center">DESCRIPCION ARTICULO</h1>
<BR>

<table align="center">
<tr bgcolor="#CCCCCC">

<td>Articulo</td>
<td>Fabricante</td>
<td>Precio</td>
</tr>
<tr>
<td><?=$articulo?></td>
<td><?=$fabrica?></td>
<td><?=$precio?></td>
</tr>

<tr>
<?php
$consulta="SELECT ruta
FROM imagenes
WHERE clave_articulo=$clave";
$resultado=mysqli_query($link,$consulta);
while($row=mysqli_fetch_array($resultado))
{
	$ruta=$row['ruta'];?>
    <td colspan="3" align="center"><img src="<?=$ruta?>" width="100" height="100"  alt=""/></td>	<?php
}
?>
</tr>
</table>

<table align="center">
<tr>
<td>COMENTARIOS</td>
</tr>
</table>

<table align="center" border="1">

<?php

$consulta="SELECT comentario,usuario,fecha
FROM comentario_articulo
WHERE clave_articulo=$clave";
$resultado=mysqli_query($link,$consulta);
while($row=mysqli_fetch_array($resultado))
{
	$comentario=$row['comentario'];
	$usuario=$row['usuario'];
	$fecha=$row['fecha'];
	?>
    <tr>
    
    <td bgcolor="#99CCFF">Usuario: <?=$usuario?></td>
    <td bgcolor="#99FFFF">Fecha: <?=$fecha?></td>
    </tr>	
	<tr>
	<td colspan="2" align="center"><?=$comentario?></td>
	</tr><?php
}	?>

</table>

<br>



<form action="articulo.php" method="get">
<table align="center">

<tr>
<td align="center">
<textarea name="comentario" COLS=30 ROWS=6></textarea>
<input type="hidden" name="clave" value="<?=$clave?>">
<input type="hidden" name="nombre_articulo" value="<?=$nombre_articulo?>">
</td>
</tr>

<tr>
<td><input type="submit" value="Insertar comentario"></td>
</tr>

</table>
</form>

</body>
</html>





