<?php
$conexion = new mysqli('localhost', 'root', '', 'avance');

if($conexion->connect_error){
        die('Error de conexión: '.$conexion->connect_error);
}

$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["archivo"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$filename= $_FILES["archivo"]["name"];

if(!empty($_FILES["archivo"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conexion->query("INSERT into archivos (nombreArchivo, subido) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "El archivo: ".$fileName. " ha sido subido correctamente.";
            }else{
                $statusMsg = "Hubo un error al intentar subir su archivo, por favor intentelo nuevamente";
            } 
        }else{
            $statusMsg = "Lo sentimos, el archivo no se guardo";
        }
    }else{
        $statusMsg = 'Lo sentimos, los unicos formatos permitidos son: JPG, JPEG, PNG, GIF, & PDF.';
    }
}else{
    $statusMsg = 'Por favor selecciona el archivo que deseas subir.';
}

// Display status message
echo $statusMsg;
?>