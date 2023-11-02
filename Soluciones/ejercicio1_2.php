<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Ejercicios Prácticos</title>
</head>

<style>
    table, th, td {
        border: 1px solid;
        align-items: center;
    }
</style>

<body>
    <h1>Ejercicio 1.2</h1>
    <p>Tabla de 10x10 con los números del 1 al 100</p>
    <table>
        <?php
        // Bucle for anidado para escribir la fila y cada columna
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . $j + ($i * 10) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>