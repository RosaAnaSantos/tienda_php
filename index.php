<?php

include 'conexion.php';


if($tipo_usuario=="admin")
{	?>
    <a href="crea_usuario.php">Crea nuevo usuario</a><?php	
}
?>

<body>	
	
	<br /><br />
	<table align="center">
	<tr>
	<td width="93" align="right"><img src="arroba.gif" width="93" height="96" /></td>
	<td width="1178" align="center"><h1 style="font-family:Century">LA TIENDA EN CASA</h1></td>
	<td width="93" align="right"><img src="arroba.gif" width="93" height="96" /></td>
	</tr>
    <tr>
    <td colspan="2" align="center">Bienvenido <?=$nombre?> <?=$apellidos?> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php"><img src="cerrar-sesion.png" width="40" height="40"></a></td>
    </tr>
	</table>	
	<br />
	<table align="center">
	<tr>
	<td width="258" height="317">
	
		<table align="center">
		<tr>
		<td height="33" align="center" bgcolor="#666666">Productos</td>
		</tr>
		<tr>
		<td height="47" align="center" bgcolor="#66FFCC"><a href="productos/nom_articulo.php">Nombre articulos</a></td>
		</tr>
		<tr>
		<td height="49" align="center" bgcolor="#99FF66">Clave articulos</td>
		</tr>
		<tr>
		<td height="63" align="center" bgcolor="#FFFF00"><a href="productos/precio_art.PHP">Precio articulos</a></td>
		</tr>
        <?php
		if($tipo_usuario=="admin")
		{?>
            <tr>
            <td align="center"><a href="productos/alta_articulo.php">Alta articulos</a></td>
            </tr><?php
		}
		?>
		</table>
        
		
	</td>
	
	<td width="235" >
	
		<table height="207" align="CENTER">
		<tr>
		<td height="38" align="center" bgcolor="#666666">Fabricantes</td>
		</tr>
		<tr>
		<td height="45" align="center" bgcolor="#999933">Clave fabricante</td>
		</tr>
		<tr>
		<td height="49" align="center" bgcolor="#FF3333">Nombre fabricante</td>
		</tr>
		<tr>
		<td height="63">&nbsp;</td>
		</tr>
		</table>
        
	
	</td>
	</tr>
	</table>
	<br /><br /><br /><br /><br /><br />
	<table align="center">
	<tr>
	<td align="right"><p style="color:#C00"><u>copyright 1998</u></p></td>
	</tr>
	</table>
	</body>
