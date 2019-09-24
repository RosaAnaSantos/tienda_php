<?php

include '../conexion.php';

include 'funciones.php';


$pepe=5;
$maria=6;




?>
<body bgcolor="#999999">

<?php

if(isset($_GET['nombre_articulo']))
{
	//$link=conectar_bd();
	
	$nombre_articulo=$_GET['nombre_articulo'];
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
	$cont=0;
	
	$consulta="SELECT * FROM articulos";
	$consulta.=" WHERE nombre LIKE '%$nombre_articulo%'";
	$resultado=mysqli_query($link,$consulta);
	while($row=mysqli_fetch_array($resultado))
	{
		$cont++;
		$clave_articulo=$row['clave_articulo'];
		$nombre=$row['nombre'];
		$precio=$row['precio'];
		$clave_fabricante=$row['clave_fabricante'];	
		
		$encuentro=0;
		
		//Aqui busco una ruta de imagen para esta clave de articulo que acabo de encontrar
		$consultaa="SELECT ruta FROM imagenes
		WHERE clave_articulo=$clave_articulo";
		$resultada=mysqli_query($link,$consultaa);
		if($rowa=mysqli_fetch_array($resultada))
		{
			$ruta=$rowa['ruta'];
			$encuentro=1;
		}
		
		
		//Ahora cierro php para mostrar los valores de las variables
		?>
		<!-- Muestra una fila de la tabla en cada pasada del bucle -->
		<tr align="center" bgcolor="#FFFFFF">
		<!-- En cada celda imprimo el valor de la variable -->
		<td>
        <a href="articulo.php?clave=<?=$clave_articulo?>&nombre_articulo=<?=$nombre_articulo?>">
        <?php
		
		if($encuentro==1)
		{	?>
			 <img src="<?=$ruta?>" width="40" height="40">	<?php
		}
		else
		{	?>
			 <img src="../peace-de-colores.jpg" width="40" height="40">	<?php
		}
       
        ?>
        </a>
        </td>
		<td><?=$nombre?></td>
		<td><?=$precio?></td>
		<td><?=$clave_fabricante?></td>
		</tr>
		<?php
		//Este bucle se va a repetir mientras se cumpla la condicion del select
	}	?>
    <tr>
    <td colspan="4" align="center" bgcolor="#666666"><?=$cont?> Articulos encontrados </td>
    </tr>
    </table>
		
    <hr />
    <br />
      

    <br /><br />
    <table align="center" border="1">
    <tr>
    <td align="center" bgcolor="#666666">Consultar por nombre de artículo</td>
    </tr>
    <tr>
    <td height="36">    
    <form action="nom_articulo.php" method="get">
    <table align="center">
    <tr>
    <td>
        <input type="text" name="nombre_articulo" />
        <input type="submit" value="Consulta" />
    </td>
    </tr>
    </table>
        </form>
      </td>
      </tr>
</table>
<hr />
	
	<?php
}

else
{
	?>
<br /><br /><br /><br /><br />
	<table align="center" border="1">
    <tr>
    <td align="center" bgcolor="#666666">Consultar por nombre de artículo</td>
    </tr>
    <tr>
<td>
<form action="nom_articulo.php" method="GET">
<table align="center">
<tr>
<td>
	<input type="text" name="nombre_articulo" />
	<input type="submit" value="Consulta" />
</td>
</tr>
</table>
	</form>
    </td>
    </tr>
    </table>
<?php
}
?>

<p align="center"><a href="/programacion/tienda/index.php"><img src="/programacion/tienda/imagenes/volver.png" width="50" height="45" /> </a></p>

</body>
