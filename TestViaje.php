<?php

/*************************** TP p/Entrega    *****************************/ 


/*+++++++++++++++++++++++++++++++++++ */
/*          MENU DE OPCIONES          */
/*+++++++++++++++++++++++++++++++++++ */
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

//AGREGO LOS OBJETOS QUE SE INCLUYEN EN EL TEST VIAJE
include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';

//VIAJES - RESPONSABLES - PASAJEROS PRECARGADOS
$listaPasajeros = array();
$listaViajes = array();
$ListaResp = array();

$listaPasajeros[0] = [  new Pasajero("HELEN", "CHUFE", 23534145, 2995111111 ),
                        new Pasajero("CARLA", "HERNANDEZ", 35098657, 2995222222 ),
                        new Pasajero("MARIANO", "YAÑEZ", 45678234, 2995333333 )];

$ListaResp[0] = (new ResponsableV(1, 1, "FACUNDO", "MARQUEZ"));

$Viaje = new Viaje( $ListaResp[0] , 111, "PORTO GALINAS", 4, $listaPasajeros[0]);

$listaViajes[0]= $Viaje;

$listaPasajeros[1] = [  new Pasajero("CARLOS", "MARTINEZ", 23534145, 2995444444 ),
                        new Pasajero("MARCOS", "POBLET", 54098234, 299555555 ),
                        new Pasajero("ABRIL", "FABA", 34777123, 299666666 )];

$ListaResp[1] = (new ResponsableV(2, 2, "CELESTE", "GUTIERREZ" ));

$Viaje = new Viaje($ListaResp[1], 222, "LAS GRUTAS", 2, $listaPasajeros[1]);

$listaViajes[1]= $Viaje;


/*+++++++++++++++++++++++++++++++++++ */
/** ACCIONES DE LAS OPCIONES DEL MENU */
/*+++++++++++++++++++++++++++++++++++ */
do{
    $opcion=seleccionarOpcion();
	switch($opcion){

	case 1: //Cargar Viaje
        $Viaje = new  Viaje( 0, 0, 0, 0, 0);
        $Viaje =cargarViaje($listaViajes);
        array_push($listaViajes,$Viaje);
        echo "\n Carga realizada con exito. \n";
		break;

	case 2: //Modificar Viaje
        print_r($listaViajes);
        // $Viaje = new  Viaje(0, 0, 0, 0, 0);
        $Viaje->cambiarViaje($listaViajes);
        array_push($listaViajes,$Viaje);
        echo "\n Carga realizada con exito. \n";
	    break;

	case 3: //Ver Datos
        $Viaje->__toSring();
		break;

    case 4: //Modificar Responsable
        
        break;

	case 5: // Salir
	    break;
	}
}while($opcion != 5);


/*+++++++++++++++++++++++++++++++++++ */
/*     OPCION UNO CARGAR VIAJE        */
/*+++++++++++++++++++++++++++++++++++ */
    function cargarViaje($listaViajes){
    $i = count($listaViajes);
    if($i== 1){
        $i = 0;
    } else{
        $i = $i;
    }
    $listaViajes[$i+1] = $this->cargarResponsable();

    echo "escriba el codigo de viaje: ";
    $codigo = trim(fgets(STDIN));
    $listaViajes[$i+1]["codigo"] = $this->setcodigoViaje($codigo);

    echo "escriba cual es el destino: ";
    $destino = trim(fgets(STDIN));
    $listaViajes[$i+1]["destino"] = $this->setDestino($destino);

    echo "escriba la cantidad Maxima de pasajeros: ";
    $cantMaxPasajeros = trim(fgets(STDIN));
    $listaViajes[$i+1]["cantMaxPasajeros"] = $this->setcantMaxPasajeros($cantMaxPasajeros);
    
    $listaPasajeros = $this->cargarPasajero($cantMaxPasajeros);
    $listaViajes[$i+1]["listaPasajeros"] = $this->setlistaPasajeros($listaPasajeros);
    
    echo "--------------------------------------------------------------\n";
    return $listaViajes[$i+1];
}

    function cargarResponsable($ListaResp){
    mostrarResponsables($ListaResp);
    echo "---------------------------\n";
    echo   "* cargar nuevo responsable (presione tecla C) \n";
    echo   "* reemplazar responsable (presione tecla R) \n";
    $rta = trim(fgets(STDIN));
    if ($rta == "C"){
        echo "ingrese numero de empleado: ";
        $numEmpleado = trim(fgets(STDIN));
        echo "ingrese numero de licencia: ";
        $numLicencia = trim(fgets(STDIN));
        echo "ingrese nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "ingrese apellido: ";
        $apellido = trim(fgets(STDIN));

        $i = count($ListaResp);
        $ListaResp[$i] = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);

    } elseif ($rta == "R"){
        echo "ingrese numero de empleado que desea reemplazar: ";
        $num = trim(fgets(STDIN));
        
        echo "Reemplazando datos: \n";
        echo "ingrese numero de empleado: ";
        $numEmpleado = trim(fgets(STDIN));
        echo "ingrese numero de licencia: ";
        $numLicencia = trim(fgets(STDIN));
        echo "ingrese nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "ingrese apellido: ";
        $apellido = trim(fgets(STDIN));

        $ListaResp[$num] = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido); 
    } else{
        echo "Error, ingrese la tecla C o R para acceder a esta opcion. ";
    }

}

// FUNCION QUE MUESTRA EL LISTADO DE RESPONSABLES (ARRAY)
function mostrarResponsables($ListaResp){
    $i = 0;
    foreach($ListaResp as $n){
        echo "---------------------------\n";
        echo "Responsable: ".($i). $n."\n";
        $i++;
    }
}


// // DE ACA HASTA OPCION CARGAR PASAJEROS INCLUIDO ESTA PEGADO DE OBJETO VIAJE, ADAPTARLO PARA QUE FUNCIONE DESDE ESTE SCRIPT
// // FUNCION OPCION 2 PARA CAMBIAR DATOS VIAJE
// public function cambiarViaje($listaViajes){
//     for($i=0;  $i<count($listaViajes); $i++){

//         echo "\n Ingrese el numero de viaje que quiere modificar: ";
//         $rta = trim(fgets(STDIN));

//         echo "escriba el nuevo codigo de viaje: ";
//         $codigo = trim(fgets(STDIN));
//         $listaViajes[$rta]["codigo"] = $this->setcodigoViaje($codigo);

//         echo "escriba cual es el nuevo destino: ";
//         $destino = trim(fgets(STDIN));
//         $listaViajes[$rta]["destino"] = $this->setDestino($destino);

//         echo "escriba la nueva cantidad Maxima de pasajeros: ";
//         $cantMaxPasajeros = trim(fgets(STDIN));
//         $listaViajes[$rta]["cantMaxPasajeros"] = $this->setcantMaxPasajeros($cantMaxPasajeros);
        
//         $listaPasajeros = $this->cargarPasajero($cantMaxPasajeros);
//         $listaViajes[$rta]["listaPasajeros"] = $this->setlistaPasajeros($listaPasajeros);
        
//         echo "--------------------------------------------------------------\n";
//         return $listaViajes[$rta];
//     }
// }

// // FUNCION PARA CARGAR PASAJEROS
// public function cargarPasajero($cantMaxPasajeros){
//         $arrayPasajeros = array();
//         echo "cuantos pasajeros se cargaran?: ";
//         $cantACargar = trim(fgets(STDIN));
//         if ($cantACargar <= $cantMaxPasajeros){
//             for ($i=0; $i < $cantACargar; $i++){
//                 echo "ingrese el DNI del pasajero ". ($i+1) . ": ";
//                 $dni = trim(fgets(STDIN));
//                 $arrayPasajeros[$i]["DNI"] = $dni;

//                 echo "ingrese el nombre del pasajero ". ($i+1) . ": ";
//                 $nombre = trim(fgets(STDIN));
//                 $arrayPasajeros[$i]["nombre"] = $nombre;

//                 echo "ingrese el apellido del pasajero ". ($i+1) . ": ";
//                 $apellido = trim(fgets(STDIN));
//                 $arrayPasajeros[$i]["apellido"] = $apellido;
//                 echo "--------------------------------------------------------------\n";
//             }
//         } else{
//             echo "la cantidad ingresada es mayor a la admitida en el destino \n";
//         }
//         return $arrayPasajeros;
// }



?>
