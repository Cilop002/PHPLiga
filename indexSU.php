<!DOCTYPE html>
<html lang="es">
<head>
	<title>Menu</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="#" method="POST">
		<table border="1" align="center">
			<tr>
				<td><input type="submit" value="Mantenimiento Equipos" name="btnE"></td>
				<td><input type="submit" value="Mantenimiento Jugadores" name="btnJu"></td>
				<td><input type="submit" value="Mantenimiento Jornadas" name="btnJo"></td>
				<td><input type="submit" value="Mantenimiento Usuario" name="btnU"></td>
			</tr>		
		</table>
	</form>
</body>
</html>

<?php 
if (isset($_POST["btnE"])) {
	header("location: vistaEquipoSU.php");
}elseif (isset($_POST["btnJu"])) {
	header("location: vistaJugadorSU.php");
}elseif (isset($_POST["btnJo"])) {
	header("location: vistaJornadaSU.php");	
}elseif (isset($_POST["btnU"])) {
	header("location: vistaUsuarioSU.php");
}
?>

