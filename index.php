<?php
if(isset($_POST["user"]) && !empty($_POST["user"]) &&
	isset($_POST["password"]) && !empty($_POST["password"])){
    $conexion = new mysqli('localhost', 'root', '', 'avance');
    
    $usuario=$_POST['user'];
    $contrasena=$_POST['password'];
    
    if($conexion->connect_error){
        die('Error de conexión: '.$conexion->connect_error);
    }else{
    $qry_select = "SELECT * FROM usuario WHERE(User='".$usuario."' AND Password = '".$contrasena."')";
    
    $result = $conexion->query($qry_select);
    
    if($result->num_rows > 0):
        header("Location: ejercicios.php");
        
        echo 'Usuario y Contraseña validos, Bienvenido al sistema';
    else:
        echo 'Usuario y Contraseña NO validos, favor de verificarlos';
    endif;
    }
}
?>