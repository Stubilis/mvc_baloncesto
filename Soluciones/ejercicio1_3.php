<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Ejercicios Prácticos</title>
</head>

<body>
    <h1>Ejercicio 1.3</h1>
        <?php
        if (!isset($_REQUEST['enviar'])) {
            // Si no venimos del formulario lo mostramos
        ?>
            <p>Indica el año y el mes</p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                Año: <input type="number" name="anio"/><br/>
                Mes: <input type="number" name="mes"/></br>
                <input type="submit" name="enviar" value="Enviar"/>
            </form>
        <?php
        } else {
            $anio = $_REQUEST['anio'];
            $mes = $_REQUEST['mes'];

            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
            echo "El mes $mes del año $anio tiene $diasMes días";
        }
        ?>
</body>
</html>