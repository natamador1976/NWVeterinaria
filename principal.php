<?php 
    include_once("calculos.php");
    session_start();

    $NombreDueño="";
    $NombreMascota="";
    $Contacto="";
    $Tratamiento=0;
    $Individual=array();
    $contador=0;
    $Juntos=isset($_SESSION['Juntos'])?$_SESSION['Juntos']:array();
        if(isset($_POST["btnAccion"])){
        
        
                $NombreDueño= isset($_POST['txtNombreD'])? $_POST['txtNombreD']:"";
                $NombreMascota= isset($_POST['txtNombreM']) ? $_POST['txtNombreM']:"";
                $Contacto= isset($_POST['txtContacto']) ? $_POST['txtContacto']:"";
                $Tratamiento= isset($_POST['txtTratamiento']) ? $_POST['txtTratamiento']:"";
                $precio=CalcularPago($Tratamiento);
                $contador++;
                $_SESSION["id"]=$contador;

                $Individual=array(
                    "Dueño"=>$NombreDueño,
                    "Contacto"=>$Contacto,
                    "Mascota"=> $NombreMascota,
                    "Tratamiento"=> NombreTratamiento($Tratamiento),
                    "Pagar"=>$precio,
                    "Fecha"=>date('Y-m-d H:i:s')
                );

                $Juntos[]=$Individual;
                $_SESSION["Juntos"]=$Juntos;
            

        }

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rib's Grooms</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
         <header>
            <nav>
                <h1>Rib's Grooms</h1>
                <ul>
                    <li>Registro</li>
                    <li>Tabla</li>
                    <li>Nosotros</li>
                </ul>
            </nav>
        </header>
   
    <form action="principal.php" method="post">
       <div>
            <label for="txtNombreD">Nombre del Dueño:</label>
            <input type="text" name="txtNombreD" id="txtNombreD">
       </div>
       <div>
            <label for="txtContacto">Contacto del Dueño:</label>
            <input type="text" name="txtContacto" id="txtContacto">
       </div>
       <div>
            <label for="">Nombre de la mascota: </label>
            <input type="text" name="txtNombreM" id="txtNombreM">
       </div>
       <div>
            <label for="txtTratamiento">Tratamiento</label>
            <select name="txtTratamiento" id="txtTratamiento">
                <option value="1">Corte</option>
                <option value="2">Lavado y Corte</option>
                <option value="3">Lavado, Corte y Secado</option>
                <option value="4">Masajes</option>
            </select>
       </div>

       <button type="submit" id="btnAccion" name="btnAccion" >Calcular</button>
          
    </form>
    <table class="table" >
        <tr>
            <th>DUEÑO</th>
            <th>CONTACTO</th>
            <th>MASCOTA</th>
            <th>TRATAMIENTO</th>
            <th>Pago</th>
            <th>Fecha</th>
        </tr>
       
        <?php foreach($Juntos as $pieces){
                echo sprintf("  <tr> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>  </tr>",
                    $pieces["Dueño"],
                    $pieces["Contacto"],
                    $pieces["Mascota"],
                    $pieces["Tratamiento"],
                    $pieces["Pagar"],
                    $pieces["Fecha"]
                );

                    

        }

        ?>
      
    </table>
     
</body>
</html>