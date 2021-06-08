<?php 
        function CalcularPago($tratamiento){
            $pago=0;
            if(!empty($tratamiento)){
                switch($tratamiento){
                    case 1:
                            $pago=50.00;
                            break;
                    case 2:
                            $pago=100.00;
                            break;
                    case 3:
                            $pago=200.00;
                            break;
                    case 4:
                            $pago=400.00;
                            break;
                    default:
                        $pago=0;

                }

            }else{
                echo "Error :( Necesito mas datos";
            }

            return $pago;
        }

        function NombreTratamiento($tratamiento){
            $nombre="";
            if(!empty($tratamiento)){
                switch($tratamiento){
                    case 1:
                        $nombre="Corte";
                        break;
                case 2:
                       $nombre="Corte y Lavado";
                        break;
                case 3:
                       $nombre="Corte, lavado y Secado";
                        break;
                case 4:
                        $nombre="Masaje";
                        break;
                default:
                        $nombre="Nada";
                }
            }
            return $nombre;
        }


        function CrearArray($nDueño,$nMascota,$contacto,$tratamiento,$precio){
                $array=array();
                $array=array(
                        "Dueño"=>$nDueño,
                        "Contacto"=>$contacto,
                        "Mascota"=> $nMascota,
                        "Tratamiento"=> $tratamiento,
                        "Pagar"=>$precio,
                        "Fecha"=>date('Y-m-d H:i:s')
                    );     

                    return $array;
        }


?>