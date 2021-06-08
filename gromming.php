<?php 
    include_once("calculos.php");
    session_start();

    $NombreDueño="";
    $NombreMascota="";
    $Contacto="";
    $Tratamiento=0;
    $Individual=array();
    $contador=0;
    $Juntos=isset($_SESSION['Juntos'])? $_SESSION['Juntos']:array();
        if(isset($_POST["btnAccion"])){
        
        
                $NombreDueño= isset($_POST['txtNombreD'])? $_POST['txtNombreD']:"";
                $NombreMascota= isset($_POST['txtNombreM']) ? $_POST['txtNombreM']:"";
                $Contacto= isset($_POST['txtContacto']) ? $_POST['txtContacto']:"";
                $Tratamiento= isset($_POST['txtTratamiento'])?$_POST['txtTratamiento']:"";
                $NombreTratamiento=NombreTratamiento($_POST['txtTratamiento']);
                $precio=CalcularPago($Tratamiento);
                $contador++;
                $_SESSION["id"]=$contador;

               /* $Individual=array(
                    "Dueño"=>$NombreDueño,
                    "Contacto"=>$Contacto,
                    "Mascota"=> $NombreMascota,
                    "Tratamiento"=> NombreTratamiento($Tratamiento),
                    "Pagar"=>$precio,
                    "Fecha"=>date('Y-m-d H:i:s')
                );*/

                $Juntos[]=CrearArray($NombreDueño,$NombreMascota,$Contacto,$NombreTratamiento,$precio);
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
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
         <header>
            <nav>
                <h1>Rib's Grooms</h1>
                <ul>
                    <li><a href="#Registro">Registro</a></li>
                    <li><a href="#Tabla">Tabla</a></li>
                    
                </ul>
            </nav>
        </header>
      <main>
   <div id="Registro">
    <form action="gromming.php" method="post">
        <h2>Registro</h2>
       <div>
            <label for="txtNombreD">Nombre del Dueño:</label>
            <input type="text" name="txtNombreD" id="txtNombreD">
       </div>
       <div>
            <label for="txtContacto">Contacto del Dueño:</label>
            <input type="text" name="txtContacto" id="txtContacto">
       </div>
       <div>
            <label for="">Nombre de la mascota:</label>
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
    </div>
    <div id="Tabla">
        <h2>Tabla de Registros</h2>
    <table class="table" >
        <tr>
            <th>DUEÑO</th>
            <th>CONTACTO</th>
            <th>MASCOTA</th>
            <th>TRATAMIENTO</th>
            <th>PAGO</th>
            <th>FECHA</th>
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
    </div>
    </main>
</body>
</html>