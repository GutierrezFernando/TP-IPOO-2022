<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $listaPasajeros;

    public function __construct( $codigoViaje, $destino, $cantMaxPasajeros, $listaPasajeros){
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->listaPasajeros = $listaPasajeros;       
    }
    
    // getters
    public function getcodigoViaje(){
        return $this->codigoViaje;
    }
    public function getDestino(){

        return $this->destino;
    }
    public function getcantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getlistaPasajeros(){
        return $this->listaPasajeros;
    } 

    // setters
    public function setcodigoViaje($codigoViaje){
        $this->codigoViaje = $codigoViaje;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setcantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function setlistaPasajeros($listaPasajeros){
        $this->listaPasajeros = $listaPasajeros;
    }

    // FUNCION OPCION 1 CARGAR VIAJE
    public function cargarViaje($listaViajes){
        $i = count($listaViajes);
        if($i== 1){
            $i = 0;
        } else{
            $i = $i;
        }
        echo "escriba el codigo de viaje: ";
        $codigo = trim(fgets(STDIN));
        $listaViajes[$i+1]["codigo"] = $this->setcodigoViaje($codigo);

        echo "escriba cual es el destino: ";
        $destino = trim(fgets(STDIN));
        $listaViajes[$i+1]["destino"] =$this->setDestino($destino);

        echo "escriba la cantidad Maxima de pasajeros: ";
        $cantMaxPasajeros = trim(fgets(STDIN));
        $listaViajes[$i+1]["cantMaxPasajeros"] =$this->setcantMaxPasajeros($cantMaxPasajeros);
        
        $listaPasajeros = $this->cargarPasajero($cantMaxPasajeros);
        $listaViajes[$i+1]["listaPasajeros"] = $this->setlistaPasajeros($listaPasajeros);
        
        echo "--------------------------------------------------------------\n";
        return $listaViajes[$i+1];
    }
    
    // FUNCION OPCION 2 PARA CAMBIAR DATOS VIAJE
    public function cambiarViaje($listaViajes){
        for($i=0;  $i<count($listaViajes); $i++){

            echo "\n Ingrese el numero de viaje que quiere modificar: ";
            $rta = trim(fgets(STDIN));

            echo "escriba el nuevo codigo de viaje: ";
            $codigo = trim(fgets(STDIN));
            $listaViajes[$rta]["codigo"] = $this->setcodigoViaje($codigo);
    
            echo "escriba cual es el nuevo destino: ";
            $destino = trim(fgets(STDIN));
            $listaViajes[$rta]["destino"] =$this->setDestino($destino);
    
            echo "escriba la nueva cantidad Maxima de pasajeros: ";
            $cantMaxPasajeros = trim(fgets(STDIN));
            $listaViajes[$rta]["cantMaxPasajeros"] =$this->setcantMaxPasajeros($cantMaxPasajeros);
            
            $listaPasajeros = $this->cargarPasajero($cantMaxPasajeros);
            $listaViajes[$rta]["listaPasajeros"] = $this->setlistaPasajeros($listaPasajeros);
            
            echo "--------------------------------------------------------------\n";
            return $listaViajes[$rta];
    }
    }

    // FUNCION PARA CARGAR PASAJEROS
    public function cargarPasajero($cantMaxPasajeros){
            $arrayPasajeros = array();
            echo "cuantos pasajeros se cargaran?: ";
            $cantACargar = trim(fgets(STDIN));
            if ($cantACargar <= $cantMaxPasajeros){
                for ($i=0; $i < $cantACargar; $i++){
                    echo "ingrese el DNI del pasajero ". ($i+1) . ": ";
                    $dni = trim(fgets(STDIN));
                    $arrayPasajeros[$i]["DNI"] = $dni;

                    echo "ingrese el nombre del pasajero ". ($i+1) . ": ";
                    $nombre = trim(fgets(STDIN));
                    $arrayPasajeros[$i]["nombre"] = $nombre;

                    echo "ingrese el apellido del pasajero ". ($i+1) . ": ";
                    $apellido = trim(fgets(STDIN));
                    $arrayPasajeros[$i]["apellido"] = $apellido;
                    echo "--------------------------------------------------------------\n";
                }
            } else{
                echo "la cantidad ingresada es mayor a la admitida en el destino \n";
            }
            return $arrayPasajeros;
    }

    // OPCION 3 MOSTRAR EN PANTALLA EL VIAJE CARGADO
    public function __toString(){
        return print_r($this);
    }
    }

?>