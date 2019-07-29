<?php

require("phpmailer\src\PHPMailer.php");
require("phpmailer\src\Exception.php");
require("phpmailer\src\SMTP.php");


if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
	isset($_POST["paterno"]) && !empty($_POST["paterno"]) && isset($_POST["materno"]) && !empty($_POST["materno"]) && isset($_POST["correo"]) && !empty($_POST["correo"]) && isset($_POST["telefono"]) && !empty($_POST["telefono"]) && isset($_POST["ciudad"]) && !empty($_POST["ciudad"]) && isset($_POST["domicilio"]) && !empty($_POST["domicilio"])){
    $conexion = new mysqli('localhost', 'root', '', 'avance');
    
    $Nombre=$_POST['nombre'];
    $Paterno=$_POST['paterno'];
    $Materno=$_POST['materno'];
    $Correo=$_POST['correo'];
    $Telefono=$_POST['telefono'];
    $Ciudad=$_POST['ciudad'];
    $Domicilio=$_POST['domicilio'];
    
    if($conexion->connect_error)
        die('Error de conexión: '.$conexion->connect_error);
    
    $qry_insert = "INSERT INTO formulario(Nombre, A_Paterno, A_Materno, Correo, Telefono, Ciudad, Domicilio) VALUES ('".$Nombre."','".$Paterno."', '".$Materno."', '".$Correo."', '".$Telefono."', '".$Ciudad."', '".$Domicilio."')";
    
    $result = $conexion->query($qry_insert);
    
    if($result > 0){
        echo 'Datos capturados correctamente/n';
        
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {

    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->SMTPDebug = 2;
    $mail->Host       = 'smtp1.gmail.com';  // Specify main and 
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'priscila.pinam@gmail.com';                     // SMTP username
    $mail->Password   = 'Changuis';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('priscila.pinam@gmail.com', 'priscy');
    
    $mail->addAddress('cimartinezmorfin@gmail.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true); 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    

    $mail->send();
    echo '/n Mensaje enviado';
} catch (Exception $e) {
    echo "Mesaje no enviado: {$mail->ErrorInfo}";
}
        
        
        
        
    }else{
        echo 'Parece ser que algo a salido mal con el sistema, favor de contactar con el administrador : Priscila Piña Molina';
    }
}
?>