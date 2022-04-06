<?php

/*************************** TP p/Entrega 1  *****************************/ 


/**
 * MODULO MENU
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
function seleccionarOpcion(){
    //Int $opcion, $respuesta 

    echo "--------------------------------------------------------------\n";
    echo "\n Elija una opcion: \n" ;
    echo "\n ( 1 ) Cargar un Nuevo Viaje";
    echo "\n ( 2 ) Modificar Viaje";
    echo "\n ( 3 ) Ver datos de los Viajes cargados";
    echo "\n ( 4 ) Salir del Programa\n";
    echo "--------------------------------------------------------------\n" ;
    echo "su opcion es: " ;
    $respuesta = trim(fgets((STDIN))) ;
    if ($respuesta <= 4 && $respuesta > 0) {
        $opcion = $respuesta ;
        return $opcion;
    } else{
        echo "Error, no ha selecionado una opcion valida \n " ;
    }
}


include 'Viaje.php';
$listaPasajeros = array();
$listaPasajeros[0] = [ "DNI" => 36444333 ,
                       "NOMBRE" => "HELEN" ,
                        "Apellido" => "CHUFE"];
$Viaje = new Viaje(111, "PORTO GALINAS", 2, $listaPasajeros[0]);
$listaViajes = array();
$listaViajes[0]= $Viaje;

$listaPasajeros[1] = [ "DNI" => 42555777 ,
                       "NOMBRE" => "ARMANDO" ,
                        "Apellido" => "MEZA"];
$Viaje = new Viaje(222, "LAS GRUTAS", 2, $listaPasajeros[1]);
$listaViajes[1]= $Viaje;

do{
    $opcion=seleccionarOpcion();
	switch($opcion){

	case 1: //Cargar Viaje
        $Viaje = new  Viaje( 0, 0, 0, 0);
        $Viaje->cargarViaje($listaViajes);
        array_push($listaViajes,$Viaje);
        echo "\n Carga realizada con exito. \n";
		break;

	case 2: //Modificar Viaje
        print_r($listaViajes);
        // $Viaje = new  Viaje( 0, 0, 0, 0);
        $Viaje->cambiarViaje($listaViajes);
        array_push($listaViajes,$Viaje);
        echo "\n Carga realizada con exito. \n";
	    break;

	case 3: //Ver Datos
        print_r($listaViajes);
		break;

	case 4: // Salir
	    break;
	}
}while($opcion != 4);

?>

