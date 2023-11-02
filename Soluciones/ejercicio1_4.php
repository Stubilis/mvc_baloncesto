<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Solución Ejercicios Prácticos</title>
</head>

<body>
   <h1>Ejercicio 1.4</h1>
   <?php
   if (!isset($_REQUEST['enviar'])) {
      // Si no venimos del formulario lo mostramos
      ?>
      <p>Indica a,b y c para una ecuación de segundo grado</p>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
         <input type="number" name="a" />X<sup>2</sup>+
         <input type="number" name="b" />X+
         <input type="number" name="c" /></br></br>
         <input type="submit" name="enviar" value="Resolver" />
      </form>
      <?php
   } else {
      $a = $_REQUEST['a'];
      $b = $_REQUEST['b'];
      $c = $_REQUEST['c'];

      $discriminante = pow($b, 2) - (4 * $a * $c);

      if ($discriminante < 0) {
         echo "La ecuación no tiene soluciones reales";
      } else {
         $sol1 = (($b * -1) + sqrt($discriminante)) / (2 * $a);
         $sol2 = (($b * -1) - sqrt($discriminante)) / (2 * $a);
         echo "Las soluciones de la ecuación son: $sol1 y $sol2";
      }
   }
   ?>
</body>

</html>