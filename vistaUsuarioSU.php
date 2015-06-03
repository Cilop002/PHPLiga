<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Usuario SU</title>
    <meta charset="utf-8">
  </head>
  <body>
      
    <form action="#" method="POST">
      <table align="center" border="1">
        <tr>
            <td>Nombre de usuario</td>
            <td><input type="text" name="us"></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td>tipo</td>
            <td><input type="text" name="tipo"></td>
        </tr>
        <tr>
            <td>Correo</td>
            <td><input type="text" name="mail"></td>
        </tr>
        
        
        <?php
        /*foreach ($datos2 as $dato) {
          echo "<tr><td>".$dato['idJugador']."</td>";
          echo "<td>".$dato['nombre']."</td>";
          echo "<td>".$dato['apellido']."</td>";
          echo "<td>".$dato['edad']."</td>";
          echo "<td>".$dato['nacionalidad']."</td>";
          echo "<td>".$dato['posicion']."</td>";
          echo "<td>".$dato['idEquipo']."</td>";
        }
        <tr>
          <td>Id Jugador</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Edad</td>
          <td>Nacionalidad</td>
          <td>Posicion</td>
          <td>Id Equipo</td>
        </tr>*/
        ?>
        <tr>
        <center>
            <input type="submit" value="Agregar Nuevo Usuario" name="btnAdd">
            <input type="submit" value="Eliminar Usuario" name="btnDel">
            <input type="submit" value="Modificar Usuario" name="btnMod">
        </center>
        </tr>
      </table>
    </form>
    <?php
//creacion del  Data Acces Object
require_once 'DAOUsuario.php';
$dao = new DAOUsuario();

$dao->listar();
function cargar(){
    $us = new Usuario();
    $us->setUserName($_POST['us']);
    $us->setPass(md5($_POST['pass']));
    $us->setTipo($_POST['tipo']);
    $us->setCorreo($_POST['mail']);
    return $us;
}
//que boton? si modificar eliminar o ingresar
if(isset($_POST['btnAdd'])){
    $dao->insertar(cargar());
    header("location:vistaUsuarioSU.php");
}
if(isset($_POST['btnDel'])){
    $dao->eliminar(cargar());
    header("location:vistaUsuarioSU.php");
}
if(isset($_POST['btnMod'])){
    $dao->modificar(cargar());
    header("location:vistaUsuarioSU.php");
}
if(isset($_POST['cmdBuscar'])){
    $dao->buscar(cargar());
}
//se prensenta la cuadricula



?>
  </body>
</html>
