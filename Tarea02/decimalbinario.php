<!DOCTYPE html>
<html lang="es">
    <!-- En este caso vamos a hacer la operación inversa al ejercicio anterior.

    El formulario consistirá en una caja de texto y un botón.
    En la caja de texto se introduce un número y al pulsar el botón deben aparecer una serie de checkboxes mostrando el equivalente en binario.
    Los checkboxes se pondrán todos en la misma fila, estando el correspondiente al bit más significativo a la izquierda.
    Un checkbox seleccionado significará que su valor es 1 y sin seleccionar 0.
    Los checkboxes deben ser creados mediante PHP.
    El número introducido no tiene que ceñirse a 8 bits, puede ser de cualquier tamaño.

Este ejercicio tiene un valor de 3,5 puntos.-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    if (!isset($_REQUEST['enviar'])) {
        // Si no venimos del formulario lo mostramos
    ?>
        <p>Introduzca un número</p>

          <!--formulario donde escribir un número decimal --> 
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      
            Decimal: <input type="number" name="decimal"/><br/>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
    <?php
    } 
    else {
        $decimal = $_REQUEST['decimal'];
        $resultadoRestos=array(); //Creamos un array donde almacenar los restos
        
        //mientras decimal sea mayor que 0, dividimos entre 2 y guardamos los restos en el array
        while ($decimal > 0)
        {
            $resultado=$decimal/2; 
            $resto=$decimal%2; 
            $resultadoRestos[]=$resto; 
            //Usamos intval para asegurarnos que estamos guardando un int
            $decimal=intval($resultado); 
            
        }
        // Ordenamos el array en orden inverso
        krsort($resultadoRestos); 

        //Usamos un bucle foreach para recorrer el array
        foreach ($resultadoRestos as $clave => $valor) 
        { 
            if($valor == 1){
               print" <input type='checkbox' name='checkboxName' checked disabled>";
            }
            else{
                print" <input type='checkbox' name='checkboxName' disabled>";
            }
          
        } 
    }
    
    
    ?>
            
    
</body>
</html>