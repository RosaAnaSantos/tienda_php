<?php
  session_start();
  unset($_SESSION["login"]); 
  unset($_SESSION["pass"]);
  session_destroy();
?>
<form action="index.php" method="get">
<br /><br />


<table align="center">
        <tr>
        <td>
            <iframe width="420" height="315" src="https://www.youtube.com/embed/wZ3TE3qoOxw?autoplay=1" frameborder="0" allowfullscreen></iframe>
        </td>
        </tr>
</table>
<br />
<table align="center">
<tr>
<td>
Introduzca usuario:
<input type="text" name="login" />
</td>
</tr>
<tr>
<td>
Introduzca contraseña:
<input type="password" name="pass" />
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align="center">
<input type="submit" value="Entrar"/>
</td>
</tr>
</table>
</form>