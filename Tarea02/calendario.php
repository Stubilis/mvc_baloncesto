<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<style>
    table, th, td {
        border: 0.5px solid;
        border-color: Gainsboro;
        align-items: center;
    }
</style>

<body>
<?php
/* ENUNCIADO:
Ejercicio 1 (calendario.php)
Tenemos un formulario con dos cajas de texto donde escribiremos un año y un mes,
 en números, al pulsar el botón debe aparecer una tabla HTML, mostrando en su fila superior
  los nombres de los días de la semana y debajo aparezca el calendario correspondiente a ese mes.
Para saber el día de la semana que se corresponde a una fecha podéis usar algo como:
        $diaSemana = date("N", strtotime("2021-10-04"));
Este ejercicio tiene un valor de 3 puntos.
*/


        if (!isset($_REQUEST['enviar'])) {
            // Si no venimos del formulario lo mostramos
        ?>
            <p>Indica el año y el mes</p>
            
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <!--formulario con dos cajas de texto donde escribir un año (anyo) y un mes, en números --> 
                Año: <input type="number" name="anyo"/><br/>
                Mes: <input type="number" name="mes"/></br>
                <input type="submit" name="enviar" value="Enviar"/>
            </form>
        <?php
        } 
        else {
                
            $anyo = $_REQUEST['anyo'];
            $mes = $_REQUEST['mes'];
            $dia=1;
            //Número de días que tiene el mes         
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);
            //el día de la semana que es el 1 del mes del año seleccionado
            $diaSemana = date("N", strtotime("$anyo-$mes-$dia"));
            //Cabecera
            print"<h3> Calendario de " . escribirNombreMes($mes) ." de ". $anyo .":</h3>";
            print"<br>";

         //Inicio tabla   
         print"<table>";
           
              
              //Calculamos el número de casillas que necesitamos
              $numCasillas = $diasMes+7+$diaSemana;
             // Bucle for anidado para escribirla tabla
             for ($i = 0; $i < $numCasillas;) {
                 echo "<tr>";
                 for ($j = 1; $j <= 7; $j++) {
                     if($i<7){
                        //Mientras i es menor que 7 se escribirá la cabecera del calendario
                        echo "<td> ".escribirCabeceraCalendario($i+1)." </td>";
                     }
                     elseif($dia>$diasMes ||$i<$diaSemana+6 ){
                        //Los días (que se pasen || sean menores que el primer dia de la semana) aparecerán vacios
                        echo "<td>  </td>";
                     }
                     else{
                        echo "<td>" . $dia . "</td>";
                        $dia++;
                     }
                     //avanza i
                     $i++;
                 }
                 echo "</tr>";
             }
        }

        ?> 
</body>
</html>
<?php 

function escribirCabeceraCalendario($numDia)
{
        switch($numDia) {
                case 6: return "Sab"; 
                case 5: return "Vie"; 
                case 4: return "Jue"; 
                case 3: return "Mie"; 
                case 2: return "Mar"; 
                case 1: return "Lun"; 
                default: return "Dom"; 
            }
}
function escribirNombreMes($numMes)
{
        switch($numMes) {
                case 11: return "Noviembre"; 
                case 10: return "Octubre"; 
                case 9: return "Septiembre"; 
                case 8: return "Agosto"; 
                case 7: return "Julio"; 
                case 6: return "Junio"; 
                case 5: return "Mayo"; 
                case 4: return "Abril"; 
                case 3: return "Marzo"; 
                case 2: return "Febrero"; 
                case 1: return "Enero "; 
                default: return "Diciembre"; 
            }
        
}
 ?>
