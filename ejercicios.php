<html>
    <head>
        <title>Ejercicios - Assessment</title>
    </head>
    <body>
        <h2>Ejercicio 1 - Assessment</h2>
        <h6>Priscila Piña Molina</h6>
        <form action="ejercicio1.php" method="post" name="formEjercicio1">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre"/></td>
                </tr>
                <tr>
                    <td>Apellido Paterno:</td>
                    <td><input type="text" name="paterno"/></td>
                </tr>
                <tr>
                    <td>Apellido Materno:</td>
                    <td><input type="text" name="materno"/></td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td><input type="email" name="correo"/></td>
                </tr><tr>
                    <td>Telefono:</td>
                    <td><input type="text" name="telefono"/></td>
                </tr>
                <tr>
                    <td>Ciudad:</td>
                    <td><input type="text" name="ciudad"/></td>
                </tr><tr>
                    <td>Domicilio:</td>
                    <td><input type="text" name="domicilio"/></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Guardar" value="Guardar"/></td>
                </tr>
            </table>
        </form>
        
        <h2>Ejercicio 2 - Assessment</h2>
        <h6>Priscila Piña Molina</h6>
        <form action="ejercicio2.php" method="post" enctype="multipart/form-data" name="formEjercicio2">
            <h4>Selecciona el archivo que deseas subir</h4>
            <input type="file" name="archivo">
            <input type="submit" name="Subir" value="Subir">
        </form>
        <div>
            <h5>Archivos subidos</h5>
            <?php
                $conexion = new mysqli('localhost', 'root', '', 'avance');

                if($conexion->connect_error){
                    die('Error de conexión: '.$conexion->connect_error);}

                $select = $conexion->query("SELECT nombreArchivo, Subido From Archivos ORDER BY Subido DESC");
                
                if($select->num_rows >0){
                       $URL = 'uploads/'.$row['nombreArchivo'];
                    echo "<table>
                            <tr>
                            <th>Nombre del archivo</th>
                            <th>Subido</th>
                            <th>Descarga</th>
                            </tr>";
                     while($row= $select->fetch_assoc()){
                         echo "<tr>
                            <td>".$row['nombreArchivo']."</td>
                            <td>".$row['subido']."</td>
                            <td><a href='$URL' download='".$row['nombreArchivo']."'>Descargar</a></td>
                            </tr>
                            </table>";
                    }
                }else{
                    echo "<p>Actualmente no hay documentos</p>";
                }
            ?>
        </div>
    </body>
</html>