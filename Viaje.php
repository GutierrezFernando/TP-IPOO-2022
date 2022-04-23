<?php

class Viaje{
    private $responsableV;
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $listaPasajeros;

    public function __construct($responsableV, $codigoViaje, $destino, $cantMaxPasajeros, $listaPasajeros){
        $this->responsableV = $responsableV;
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->listaPasajeros = $listaPasajeros;       
    }
    
    // getters
    public function getResponsableV(){
        return $this->responsableV;
    }
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
    public function setResponsableV($responsableV){
        $this->responsableV = $responsableV;
    }
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

    // MOSTRAR EN PANTALLA DATOS DEL VIAJE
    public function __toString(){
        $datos = "Responsable: " . $this->getResponsableV() .
                 "Codigo de Viaje: " . $this->getcodigoViaje() .
                 "Destino: " . $this->getDestino() .
                 "Cantidad Maxima de Pasajeros: " . $this->getcantMaxPasajeros() .
                 "Lista de Pasajeros: " . $this->listadoPasajeros($this->getlistaPasajeros()) ;
        return $datos;
    }

    //FUNCION QUE HACE UN STRING CON EL LISTADO DE PASAJEROS
    public function listadoPasajeros( $listaPasajeros ){
        $i=1;
        foreach( $listaPasajeros as $pasajero ){
            echo "\n Pasajero ". $i. ": ";
            echo "\n Nombre: " . $this->nombre . 
                 "\n Apellido: " . $this->apellido . 
                 "\n DNI: " . $this->dni . 
                 "\n Telefono: " . $this->telefono; 
        }
    }

}


?>