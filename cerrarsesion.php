<?php
  session_start();
  unset($_SESSION["login"]); 
  unset($_SESSION["pass"]);
  session_destroy();
?>
<br /><br /><br />
<p align="center">HASTA PRONTO!</p>

<form action="index.php" method="post">

<br /><br /><br />
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
<td align="center">
<input type="submit" value="Entrar"/>
</td>
</tr>
</table>
</form>