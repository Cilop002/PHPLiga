<html>
    <head>
        <title>Tabla de posiciones</title>
    </head>
    <body>
        <form action="#" method="POST">
            <table align="center" border="1">
                <h1>Tabla de posiciones</h1>
                <tr>
                    <td>Id Equipo</td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Id Equipo</td>
                    <td>Equipo</td>
                    <td>PJ</td>
                    <td>G</td>
                    <td>E</td>
                    <td>P</td>
                    <td>GF</td>
                    <td>GC</td>
                    <td>+/-</td>
                    <td>Pts</td>
                </tr>
                <?php

                /*foreach ($datos as $dato){
                    echo "<tr><td>".$dato['idEquipo']."</td>";
                    echo "<td>".$dato['nombre']."</td>";
                    echo "<td>".$dato['PJ']."</td>";
                    echo "<td>".$dato['PG']."</td>";
                    echo "<td>".$dato['PE']."</td>";
                    echo "<td>".$dato['PP']."</td>";
                    echo "<td>".$dato['GF']."</td>";
                    echo "<td>".$dato['GC']."</td>";
                    echo "<td>".$dato['DG']."</td>";
                    echo "<td>".$dato['puntos']."</td></tr>";
                }*/
                    ?>
                <tr>
                <center>
                    <input type="submit" value="Agregar Equipo" name="btnAdd">
                    <input type="submit" value="Eliminar" name="btnDel">
                    <input type="submit" value="Modificar" name="btnMod">
                </center>
                </tr>
            </table>
        </form>
        <?php
//creacion del  Data Acces Object
require_once 'DAOEquipo.php';
$dao = new DAOEquipo();


function cargar(){
    $equi = new Equipo();
    $equi->setIdEquipo($_POST['id']);
    $equi->setNombre($_POST['nom']);
    $equi->setPJ(0);
    $equi->setPG(0);
    $equi->setPE(0);
    $equi->setPP(0);
    $equi->setGF(0);
    $equi->setGC(0);
    $equi->setDG(0);
    $equi->setPuntos(0);
    return $equi;
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
