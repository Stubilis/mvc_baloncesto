<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Ejercicios Prácticos</title>
</head>

<body>
    <h1>Ejercicio 1.1</h1>
    <p>Estos son los 100 primeros números de la serie de Fibonacci</p>
    <p>
        <?php
        // Función recursiva - si el número es muy grande tardará mucho
        function fibonacci($n) {
            if ($n < 2)
                return $n;
            else
                return fibonacci($n - 1) + fibonacci($n - 2);
        }

        // Ahora usamos la función para mostrar los 100 primeros valores
        // OJO! Con números grandes tarda mucho
        for ($i = 0; $i <= 20; $i++) {
            echo fibonacci($i) . " - ";
        }
        ?>
        </p>

        <?php
        // Este es el algoritmo iterativo
        $v1 = 0;
        $v2 = 1;

        // Mostramos el primer número de la serie de Fibonacci
        echo $v1 . " - ";

        // Bucle para mosrtrar los siguientes números
        for ($i = 0; $i < 100; $i++) {
            $temp = $v1;
            $v1 = $v2;
            $v2 = $temp + $v1;
            echo $v1 . " - ";
        }

        ?>
</body>

</html>