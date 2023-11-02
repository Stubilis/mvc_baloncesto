<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea03 DWES</title>
</head>
<body>
    <?php 
    //Conexion a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'bibliot3');
    print $conexion->server_info;
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }
    //Consulta a la base de datos que nos devuelve el nombree de los socios, el ejemplar, el titulo del libro, la fecha de devolucion y la fecha de prestamo ordenado por fecha de prestamo
     $consulta = " select Socios.soc_nombre, prestamos.pre_ejemplar,libros.lib_isbn,libros.lib_titulo, prestamos.pre_fecha, prestamos.pre_devolucion from (((prestamos INNER JOIN Socios on prestamos.pre_socio=soc_id)Inner join ejemplares on prestamos.pre_ejemplar = ejemplares.eje_signatura) inner join libros on libros.lib_isbn = ejemplares.eje_libro)order by prestamos.pre_fecha desc;";
    $resultado = $conexion->query($consulta);
  
    if (!isset($_REQUEST['nuevo'])) {
        //  header('Location: nuevo_prestamo.php');
        // Si no venimos del formulario lo mostramos
              
     ?>
    <!-- una tabla HTML con los préstamos realizados. 
    Los datos que se mostrarán serán el nombre del socio, la signatura del ejemplar, 
    el título del libro y las fechas de devolución y préstamo. 
    En la parte superior deben aparecer los últimos preśtamos realizados.
    Debe dar la oportunidad de filtrar los resultados por socio y libro (¡ojo, no por ejemplar!).
    En lugar de la fecha de devolución, cuando el préstamo no haya sido devuelto aparecerá un botón que
    automáticamente realizará la devolución del préstamo, 
    tomando como fecha de devolución la fecha actual.
    Al final de cada fila debe aparecer un botón que elimine el préstamo al que se corresponda esa fila.
    En la parte inferior de la página debe aparecer un botón para crear un nuevo préstamo. Este botón nos llevará a una nueva página.
   
 -->
 <table id=tablaRes>
    <tr>
        <th>Socio</th>
        <th>Ejemplar</th>
        <th>ISBN</th>
        <th>Titulo</th>
        <th>Fecha de devolución</th>
        <th>Fecha de préstamo</th>
    </tr>

        <?php
        //cargamos los datos de la base de datos en la tabla    
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$fila['soc_nombre']."</td>";
            echo "<td>".$fila['pre_ejemplar']."</td>";
            echo "<td>".$fila['lib_isbn']."</td>";
            echo "<td>".$fila['lib_titulo']."</td>";
            echo "<td>".$fila['pre_devolucion']."</td>";
            echo "<td>".$fila['pre_fecha']."</td>";
           echo "<td><input type='submit' name='devolver' value='Devolver'/></td>";
            echo "</tr>"; 
        }
         ?>
 </table>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="submit" name="nuevo" value="Nuevo préstamo" />
            </form>
            <?php
            //Si pulsamos el boton de nuevo prestamo nos lleva a la pagina de nuevo prestamo
           
            //Si pulsamos el boton de devolver nos actualiza la fecha de devolucion a la fecha actual
            if (isset($_REQUEST['devolver'])) {
                $today = date("Y-m-d"); 
                $consulta = "' UPDATE prestamos SET pre_devolucion = '$today' WHERE pre_ejemplar = ".$fila['pre_ejemplar'].";";
                $resultado = $conexion->query($consulta);
            }
        } else {    
            //mostramos el formulario de crear prestamo
            $consulta= "INSERT INTO 'Prestamos' ('pre_fecha',  'pre_socio', 'pre_ejemplar`) VALUES;";
        }
            ?>
    
</body>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
</html>