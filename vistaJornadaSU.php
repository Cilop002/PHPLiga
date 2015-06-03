<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Jornada SU</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="#" method="POST">
      <table align="center" border="1">
        <tr>
            <td>Id Jornada</td>
            <td><input type="text" name="idJor"></td>
        </tr>
        <tr>
            <td>Fecha de la jornada</td>
            <td><input type="text" name="fe"></td>
        </tr>
        <tr>
            <td>Resultado 1</td>
            <td><input type="text" name="r1"></td>
        </tr>
        <tr>
            <td>Resultado 2</td>
            <td><input type="text" name="r2"></td>
        </tr>
        <tr>
            <td>Resultado 3</td>
            <td><input type="text" name="r3"></td>
        </tr>
        <tr>
            <td>Resultado 4</td>
            <td><input type="text" name="r4"></td>
        </tr>
        <tr>
            <td>Resultado 5</td>
            <td><input type="text" name="r5"></td>
        </tr>
          <td>Id Jornada</td>
          <td>Fecha</td>
          <td>Resultado 1</td>
          <td>Resultado 2</td>
          <td>Resultado 3</td>
          <td>Resultado 4</td>
          <td>Resultado 5</td>
        </tr>
        
        <?php
        /*foreach ($datos3 as $dato) {
          echo "<tr><td>".$dato['idJornada']."</td>";
          echo "<td>".$dato['fecha']."</td>";
          echo "<td>".$dato['resultado1']."</td>";
          echo "<td>".$dato['resultado2']."</td>";
          echo "<td>".$dato['resultado3']."</td>";
          echo "<td>".$dato['resultado4']."</td>";
          echo "<td>".$dato['resultado5']."</td>";
        }*/
        ?>
        <tr>
        <center>
            <input type="submit" value="Agregar Jornada" name="btn3">
            <input type="submit" value="Eliminar" name="btn3">
            <input type="submit" value="Modificar" name="btn3">
        </center>
        </tr>
      </table>
    </form>
      <?php
//creacion del  Data Acces Object
require_once 'DAOJornada.php';
$dao = new DAOJornada();


function cargar(){
    $jor = new Jornada();

    return $jor;
}
//que boton? si modificar eliminar o ingresar
if(isset($_POST['btnAdd'])){
    $dao->insertar(cargar());
    $dao->listar();
}
if(isset($_POST['btnDel'])){
    $dao->eliminar(cargar());
    $dao->listar();
}
if(isset($_POST['btnMod'])){
    $dao->modificar(cargar());
    $dao->listar();
}
if(isset($_POST['cmdBuscar'])){
    $dao->buscar(cargar());
}
//se prensenta la cuadricula



?>
  </body>
</html>
