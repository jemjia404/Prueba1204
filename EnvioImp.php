<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
$ArchivoIMP2=$NombreIMP=$EmailIMP=$TelefonoIMP=$CantidadIMP=$MaterialIMP=$colorMIMP=$ExtrasIMP=$EscaladoIMP="";
require 'assets/php/Exception.php';
require 'assets/php/PHPMailer.php';
require 'assets/php/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
$dia=date("%A %d de %B del %Y");
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
    font-family: 'Lucida Calligraphy',cursive;
    }
    .p3{
    font-family: Tahoma, Verdana, sans-serif;
    }
 </style>
 </head>
<body >
<div  style='background-color:blue;padding:2%;'> 
<p class='p4' style='color:white; text-align:center;padding-top:3%;font-size:5vw'>Pcb De México S De Rl Mi </p>
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
Fecha de emision: $dia <br/>
 </p>
</div>
<div  class='footer' style='padding:5%'></div>
</body>
";
$bodyE = "
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
    font-family: 'Lucida Calligraphy',cursive;
    }
    .p3{
    font-family: Tahoma, Verdana, sans-serif;
    }
 </style>
 </head>
<body >
<div  style='background-color:blue;padding:2%;'> 
<p class='p4' style='color:white; text-align:center;padding-top:3%;font-size:5vw'>Pcb De México S De Rl Mi </p>
</div>
<div style=padding-left:20% >
<h1 class='p4' >Cotizacion de PCB desde pagina WEB </h1>
<p  class='p3' style='font-size:medium'>
Usuario:<b>$NombrePCB</b><br/>
Correo:<b> $EmailPCB</b><br/>
Empresa:<b> $EmpresaPCB</b><br/>
Telefono: <b>$TelefonoPCB </b><br/> 
Cantidad: <b>$CantidadPCB</b><br/> 
Material:<b>$MaterialPCB</b> <br/>
Color de Mascara:<b> $ColorMAPCB</b> <br/> 
Serigrafia: <b>$SerigrafiaPCB</b> <br/> 
Numero de caras:<b> $NCarasPCB </b> <br/>
Espesor de material:<b> $EspesorPCB </b><br/> 
Onzas de cobre:<b> $Onzas</b> <br/> 
PTH: <b>$PTHPCB</b> <br/> 
Dimension en eje X: <b>$DXPCB $UnidadesPCB </b><br/>
Dimension en eje Y: <b>$DYPCB $UnidadesPCB</b> <br/>
 Acabados: <b>$AcabadosPCB </b><br/>
Cantidad de diametro de brocas:<b> $CantidadDDPCB</b><br/>
 Cantidad de Perforaciones: <b> $CantidadDPPCB</b> <br/> 
 Apartado de Extras:<b> $ExtrasPCB </b> <
 Fecha de emision: $dia<br/>
 </p><br/>
</div>
<br/>
<p> Prueba de envio de correo desde puerto 465 protocolo SMTPS para paginas de encriptado HTTPS con soporte para charset utf-8 configuraccion cpnanel de direccion@pcbdemexico.com.mx</p>
 <div class='footer' style='padding:5%'> 
 </div>   
 </body>
";
$mailer->isSMTP();
$mailer->SMTPDebug = 0;
$mailer->Host = 'mail.pcbdemexico.com.mx';
$mailer->Port = 465; 
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mailer->SMTPAuth = true; 
$mailer->Username = "direccion@pcbdemexico.com.mx"; 
$mailer->Password = "Ra+272002"; 
$mailer->setFrom("direccion@pcbdemexico.com.mx","$NombreIMP desde Pagina WEB de PCB de Mexico");// Quien envia 
$mailer->addAddress("lappcbmex@gmail.com","Ingenieria" );// Quien recibe 
//$mailer->addAddress("ingenieria@pcbdemexico.com.mx","M. en T. Rodolfo Morales Guerrero ");
//$mailer->addAddress("ventas@pcbdemexico.com.mx", "ING. Rafael Tavera Paredes");
//$mailer->addAddress("compras@pcbdemexico.com.mx", "ING.");
$mailer->Subject = 'Cotización de Impresion 3D desde pagina WEB';
$mailer->addAttachment( $_FILES["ArchivoIMP"]['tmp_name'],  $_FILES["ArchivoIMP"]['name']);
$mailer->CharSet="UTF-8";
$mailer->msgHTML("$bodyI $bodyE ");
$mailer->AltBody=strip_tags("$bodyI $bodyE") ;
$respuesta=$mailer->send();
if($respuesta==true){
header ("location: Gracias.html");
 exit();
}else{
 header ('Location: index.html');
 exit();
}
?>

