

<?php 
    $ArchivoPCB=$NombrePCB=$EmailPCB=$EmpresaPCB=$TelefonoPCB=$CantidadPCB=$MaterialPCB=$ColorMAPCB=$SerigrafiaPCB="";
    $NCarasPCB=$EspesorPCB=$Onzas=$PTHPCB=$DXPCB=$DYPCB=$UnidadesPCB=$AcabadosPCB=$CantidadDDPCB=$CantidadDPPCB=$ExtrasPCB=""; 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require 'Exception.php';
//require 'assets/php/PHPMailer.php';
require 'PHPMailer.php';
//require 'assets/php/SMTP.php';
require 'SMTP.php';
   // require 'assets/php/Exception.php';
   // require 'assets/php/PHPMailer.php';
   // require 'assets/php/SMTP.php';
    $mailer = new PHPMailer(true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NombrePCB=$_POST["nombrePCB"];
    $EmailPCB=$_POST["EmailUsuPCB"];
    $EmpresaPCB=$_POST["EmpresaPCB"];
    $TelefonoPCB=$_POST["TELPCB"];
    $CantidadPCB=$_POST["CantidadPCB"];
    $MaterialPCB=$_POST["rdMaterial"];
    $ColorMAPCB=$_POST["rdColor"];
    $NCarasPCB=$_POST["rdCaras"];
    $EspesorPCB=$_POST["rdG"];
    $Onzas=$_POST["rdOz"];
    $PTHPCB=$_POST["PTHS"];
    $DXPCB=$_POST["largoP"];
    $DYPCB=$_POST["AltoP"];
    $UnidadesPCB=$_POST["Unidad"];
    $AcabadosPCB=$_POST["sellist1"];
    $CantidadDDPCB=$_POST["BrocasA"];
    $CantidadDPPCB=$_POST["Perforaciones"];
    $ExtrasPCB=$_POST["SecExtras"];
    $SerBott=$_POST["rdSERBOT"];
    $SerTop=$_POST["rdSERTOP"];
    if ($SerBott=="" && $SerTop==""){
        $SerigrafiaPCB="Sin Serigrafia";
    }
    elseif($SerBott==="Serigrafia Bottom" && $SerTop==="Serigrafia Top "){
        $SerigrafiaPCB= "Top Overlay  y  Buttom Overlay";
    }
    elseif($SerBott==="Serigrafia Bottom" ){
        $SerigrafiaPCB="Buttom Overlay ";
    }
    elseif($SerTop==="Serigrafia Top "){
        $SerigrafiaPCB="Top Overlay ";
    }
    if ($EmpresaPCB==""){
        $EmpresaPCB="No indicada";
    }
    if ($CantidadDDPCB==""){
        $CantidadDDPCB="No indicada ";
    }
    if ($CantidadDPPCB==""){
    $CantidadDPPCB="No indicada ";
    }
    if ($ExtrasPCB==""){
        $ExtrasPCB="Sin Extras sugeridos ";
    }

$bodyE = " <head>   
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
<div  style='background-color:blue;padding:5%'></div>
<div style=padding-left:20% >
<h1 class='p4' >Prueba de envio de correo </h1>
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
 Apartado de Extras:<b> $ExtrasPCB </b></p>
</div>
<br/>
 <div class='footer' style='padding:5%'> 
 </div>   
 </body>
";
}
$mailer->isSMTP();
$mailer->SMTPDebug = 0;
$mailer->Host = 'smtp-mail.outlook.com'; // Cambia esto al servidor SMTP que estés utilizando
$mailer->Port = 587; // Puerto para conexión TLS
$mailer->SMTPAuth = true; // Habilita la autenticación SMTP

$mailer->Username = "mebj201920707@tese.edu.mx"; // Tu dirección de correo
$mailer->Password = 'AZTK160010152-9'; // Contraseña de tu cuenta de correo

$mailer->setFrom("mebj201920707@tese.edu.mx","$NombrePCB desde Pagina WEB de PCB de Mexico");// Quien envia 
$mailer->addAddress("jemjia404@gmail.com","Jesus Emmanuel Mejia Badillo" );// Quien recibe 
//$mailer->addCC("ingenieria@pcbdemexico.com.mx","M. en T. Rodolfo Morales Guerrero ");
$mailer->addBcc("$EmailPCB", "$NombrePCB ");
$mailer->Subject = 'Cotización desde pagina WEB ';
$mailer->addAttachment($_FILES['Archivo_PCB']['tmp_name'], $_FILES['Archivo_PCB']['name']);
$mailer->CharSet="UTF-8";
$mailer->msgHTML("$bodyE");
$mailer->AltBody=strip_tags($bodyE) ;
if($mailer->send()){
    header('index.html');
}else{
    echo'No enviado ';
}





?>