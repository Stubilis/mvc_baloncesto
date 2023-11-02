<!DOCTYPE html>
<html lang="es">
    <!--Ejercicio 2 (binariodecimal.php)

A partir de un formulario formado por ocho checkboxes y un botón vamos a hacer el paso de binario a decimal.

    Los checkboxes se pondrán todos en la misma fila, estando el correspondiente al bit más significativo a la izquierda.
    Un checkbox seleccionado significará que su valor es 1 y sin seleccionar 0.
    Al pulsar el botón el programa devolverá su equivalente en decimal.
    Los checkboxes deben ser creados mediante PHP.

Este ejercicio tiene un valor de 3,5 puntos.
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binario a Decimal</title>
</head>
<body>
    <?php 
    if (!isset($_REQUEST['enviar'])) {
        // Si no venimos del formulario lo mostramos
        ?>
        <p>Número binario</p>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="checkbox" name="check7" >
        <input type="checkbox" name="check6" >
        <input type="checkbox" name="check5" >
        <input type="checkbox" name="check4" >
        <input type="checkbox" name="check3" >
        <input type="checkbox" name="check2" >
        <input type="checkbox" name="check1" >
        <input type="checkbox" name="check0" >
           <input type="submit" name="enviar" value="Pasar a decimal" />
        </form>
        <?php
     } else {
         //Creamos un array de 8 posiciones y lo rellenamos con 0
         $digitos = array_fill(0, 8, 0);
            //Recorremos el array y si el checkbox está marcado, el valor de la posición correspondiente pasa a ser 1
            foreach ($digitos as $clave => $valor) {
                if( isset($_REQUEST['check'.$clave])){
                    $digitos[$clave] = 1;
                }
            }
        $resultado =0;
       //Calculamos el resultado
       foreach ($digitos as $clave => $valor) {
        //en php no podemos usar 2^2 sino pow(2,2) o 2**2 
        $resultado = $resultado + ($valor*(2**$clave));
       }
       //Imprimimos el resultado en pantalla 
       echo $resultado;
     }
     ?>
    
</body>
</html>