<?php
$ArchivoIMP2=$NombreIMP=$EmailIMP=$TelefonoIMP=$CantidadIMP=$MaterialIMP=$colorMIMP=$ExtrasIMP=$EscaladoIMP="";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require 'assets/php/Exception.php';
require 'Exception.php';
//require 'assets/php/PHPMailer.php';
require 'PHPMailer.php';
//require 'assets/php/SMTP.php';
require 'SMTP.php';
$mailer = new PHPMailer(true);


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $NombreIMP=$_POST["NombreUsuI"];
    $EmailIMP=$_POST["EmailUsuIMP"];
    $TelefonoIMP=$_POST["TELEFIMP"];
    $CantidadIMP=$_POST["CantidadIMP"];
    $MaterialIMP=$_POST["MaterialIMP"];
    $colorMIMP=$_POST["ColorIMp"];
    $ExtrasIMP=$_POST["ExtrasIMP"];
    $EscaladoIMP=$_POST["PorCentEsca"];

}
if ($EscaladoIMP==""){
$EscaladoIMP="100";

}
$bodyI="
<head>   
    <style>  
    .footer {
    padding: 2%;
    color: white;
    padding-left: 4%;
    background-color: black;
    }
    .footext:hover {
    color: rgb(227, 141, 237);
    }
    .p4 {
    font-family: 'Kaushan Script',cursive;
    }
    .p3{
    font-family: Tahoma, Verdana, sans-serif;
    }
 </style>
 </head>
<body >
<div  style='background-color:blue;padding:10%:'> <p class='p4' style='color:white; text-align:center;padding-top:3%;font-size:5vw'>Pcb De México S De Rl Mi </p>
<br/>

</div>
<div style=padding-left:20% >
<h1 class='p4' >Cotización de Impresion 3D desde página WEB </h1>
<p  class='p3' style='font-size:medium'>
Nombre:<b> $NombreIMP</b> <br/>
Email: <b> $EmailIMP</b><br/>
Telefono:<b> $TelefonoIMP </b><br/>
Cantidad: <b> $CantidadIMP</b><br/> 
Material:<b> $MaterialIMP </b><br/>
Color de material: <b>$colorMIMP</b><br/>
Seccion extras: <b> $ExtrasIMP</b><br/>
Escalado: <b> $EscaladoIMP %</b> <br/>
 </p>
</div>
<div  class='footer' style='padding:5%'></div>
</body>

";
echo "$bodyI";
 
$mailer->isSMTP();
$mailer->SMTPDebug = 2;
$mailer->Host = 'smtp-mail.outlook.com'; // Cambia esto al servidor SMTP que estés utilizando
$mailer->Port = 587; // Puerto para conexión TLS
$mailer->SMTPAuth = true; // Habilita la autenticación SMTP

$mailer->Username = "mebj201920707@tese.edu.mx"; // Tu dirección de correo
$mailer->Password = 'AZTK160010152-9'; // Contraseña de tu cuenta de correo

$mailer->setFrom("mebj201920707@tese.edu.mx","$NombreIMP desde Pagina WEB de PCB de Mexico");// Quien envia 
$mailer->addAddress("jemjia404@gmail.com","Jesus Emmanuel Mejia Badillo" );// Quien recibe 
//$mailer->addCC("ingenieria@pcbdemexico.com.mx","M. en T. Rodolfo Morales Guerrero ");
$mailer->addaddCC("$EmailIMP", "$NombreIMP");
$mailer->Subject = 'Cotización de Impresion 3D desde pagina WEB';
$mailer->addAttachment( $_FILES["ArchivoIMP"]['tmp_name'],  $_FILES["ArchivoIMP"]['name']);
$mailer->CharSet="UTF-8";
$mailer->msgHTML("$bodyI");
$mailer->AltBody=strip_tags("$bodyI") ;
if($d=$mailer->send()){
    echo "Enviado "; 
    header('index.html');
}else{
    echo 'No enviado ';
}
?>
