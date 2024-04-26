

function activarFR4() {
    document.getElementById('rd2Caras').    disabled =  false

    document.getElementById('rdG1').        disabled =  false
    document.getElementById('rdG2.3').      disabled =  false
    document.getElementById('rdOz2').       disabled =  false 
    document.getElementById('rdOz.5').      disabled =  false
    document.getElementById('CMPTH').       disabled =  false
    document.getElementById('CPTH').        disabled =  false
    document.getElementById('rdOz3').       disabled =   false
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
    document.getElementById('rd1Cara'). checked =   false
    document.getElementById('rdG1.6').  checked =   false
    document.getElementById('rdOz1').   checked =   false 
    
    var sinser = document.getElementById('rdSinS');
    if (sinser.checked==false) { 
    document.getElementById('rdBo').disabled = false
    }

}
function desactivarFR4() {
    document.getElementById('rd2Caras').disabled =  true
    document.getElementById('rdG1').    disabled =  true
    document.getElementById('rdG2.3').  disabled =  true
    document.getElementById('rdOz2').   disabled =  true
    document.getElementById('rdOz.5').  disabled =  true
    document.getElementById('CMPTH').   disabled=   true
    document.getElementById('CPTH').    disabled=   true
    document.getElementById('rdOz3').   disabled=   true
    var sinser = document.getElementById('rdSinS');
    if (sinser.checked == false) {
        document.getElementById('rdBo').disabled = false
    }
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
    document.getElementById('rd1Cara'). checked =    true
    document.getElementById('rdG1.6').  checked =    true
    document.getElementById('rdOz1').   checked =    true
    document.getElementById('CSPTH').   selected =   true
}  

function SinSerigrafia() {
    var sinSerigrafia = document.getElementById('rdSinS');
    var to = document.getElementById('rdTop');
    var bott = document.getElementById('rdBo');
    var aluminio = document.getElementById('rdAlu');

    if (sinSerigrafia.checked == true) {
        to.disabled = true;
        to.checked=false
        bott.disabled = true;       
        bott.checked = false;
    }else {
        to.disabled = false;
        to.checked = true
        if (aluminio.checked==false ) {
        bott.disabled = false; 
        }
    }
}

function Alum() {
    document.getElementById('rd2Caras').disabled = true

    document.getElementById('rdG1').    disabled = true
    document.getElementById('rdG2.3').  disabled = true
    document.getElementById('rdOz2').   disabled = true
    document.getElementById('rdOz.5').  disabled = true
    document.getElementById('CMPTH').   disabled = true
    document.getElementById('CPTH').    disabled = true
    document.getElementById('rdBo').    disabled = true
    document.getElementById('rdBo').    checked  = false
    /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
    document.getElementById('rd1Cara'). checked  = true
    document.getElementById('rdG1.6').  checked  = true
    document.getElementById('rdOz1').   checked  = true
    document.getElementById('CSPTH').   selected = true
}

function  NoCamposVaciosPCB() {
        var Archivo, Nombre, Email, TEL, Cant,  DX, DY, Cara1, Cara2, rdG8, rdG1, rdG6, rdG2,Onz3, Onz1,Onz2, Onz05, pthE, SExtras ;
        Archivo = document.getElementById('btn-file').value;
        Nombre = document.getElementById('nombrePCB').value;
        Email = document.getElementById('EmailUsuPCB').value;
        TEL = document.getElementById('NCel').value;
        Cant = document.getElementById('CantidadP').value;
        DX = document.getElementById('LargoP').value;
        DY = document.getElementById('AltoP').value;
        pthE=document.getElementById('PTHS').value;
        SExtras=document.getElementById('lblExtras').value;
        /*---------------------------------------------------------------------------------*/ 
        Cara1=document.getElementById('rd1Cara').checked;
        Cara2=document.getElementById('rd2Caras').checked;
        /*----------------------------------------------------------------------------------*/       
        rdG1=document.getElementById('rdG1').checked;
        rdG6=document.getElementById('rdG1.6').checked;
        rdG2=document.getElementById('rdG2.3').checked;
        /* -------------------------------------------------------------------------------------*/
        Onz05=document.getElementById('rdOz.5').checked;
        Onz1=document.getElementById('rdOz1').checked;
        Onz2=document.getElementById('rdOz2').checked;
        Onz3=document.getElementById('rdOz3').checked;
        /*---------------------------------------------------------------------------------------- */
    if ( Archivo==="" || Nombre==="" || Email === "" || TEL === "" || Cant === ""  ||  DX === "" || DY === ""  ) {
        if (Archivo === "") {
            alert("Sube tu archivo 📄");
        }
        if (Nombre === "") {
            alert("Coloca tu nombre  ");
        }
        if (Email === "") {
            alert("Ingresa tu Email");
        }
        if (TEL === "") {
            alert(" Ingresa tu número de teléfono ");
        }
        if (Cant === "") {
            alert("Ingresa la cantidad de piezas ");
        }
        if (DX === "") {
            alert("Ingresa la dimensión de X");
        }
        if (DY === "") {
            alert("Ingresa la dimensión de Y");
        }
       /*-------------------------------------- */
    return false;
    }
    if(Cara1==false && Cara2==false ){
        alert("Selecciona la cantidad de caras");  
        return false;      
    }    
    if (pthE=="Otro" && SExtras===""){
           alert ("Menciona el tipo de PTH ")
           return false;
    }
    if (rdG8 ==false && rdG1==false && rdG6==false && rdG2==false ){
        alert ("Elige el espesor del material  ");
        return false;
    }
    if (Onz05==false && Onz1==false && Onz2==false && Onz3 ==false ){
        alert ("Elige la cantidad de onzas de tu PCB´s");
        return false;
    }


}

function NoCamposVaciosImpresion() {
    var ArchivoI, NombreI, EmailI, TELI, Cantidad, Material, SextrasImp, ColorImp;
    ArchivoI = document.getElementById('btnFileImpresion').value;
    NombreI = document.getElementById('NombreI'). value;
    EmailI = document.getElementById('EmailUsuI').value;
    TELI = document.getElementById('NCelI').value;
    Cantidad= document.getElementById('CantidadI').value;
    Material=document.getElementById('selMaterialI').value;
    ColorImp=document.getElementById('ColorMI').value;   
    SextrasImp =document.getElementById('SextrasImp').value;       
    if ( ArchivoI === "" || NombreI === "" || EmailI === "" || TELI === "" || Cantidad === "") {
        if (ArchivoI === "") {
            alert("Ingresa tu archivo a imprimir en 3D 📄");
            return false;
        }
        if (NombreI === "") {
            alert("Ingresa tu nombre");
            return false;
        }
        if (EmailI === "") {
            alert("Ingresa tu Email");
            return false;
        }
        if (TELI === "") {
            alert("Ingresa tu número de teléfono ");
            return false;
        }
        if (Cantidad === "") {
            alert("Ingresa la cantidad");
            return false;
        }
    }
    if (Material==="Otro (seccion Extras)" && SextrasImp==="" ){
        alert("Ingresa el tipo de material en la sección de Extras");
        return false;
    }
    if (ColorImp==="Otro (seccion Extras)" && SextrasImp==="" ){
        alert("Ingresa el color del material en la sección de Extras");
        return false;
    }
}


function SerigrafiaN() {
    var BottonS = document.getElementById('rdBo');
    var TopS = document.getElementById('rdTop');
    var SinSer = document.getElementById('rdSinS');
    if (BottonS.checked == false && TopS.checked == false && SinSer.checked == false ) {
        SinSer.checked = true
        BottonS.disabled = true
        TopS.disabled = true
    }
}


function CostoT() {
    Presss = CantidadP.value * PBMSDLAa
    document.getElementById('Muestra').innerHTML = Presss.toFixed(2);
    document.getElementById('CText').innerHTML = "Cantidad Total:"
    document.getElementById('$').innerHTML = "$"
    document.getElementById('mo').innerHTML="MXN"
}

function fr3() {
    var cara1,cara2,esp=""; 
    
    esp=document.getElementById('rdG2.3').      checked;
    cara1=document.getElementById('rd1Cara').   checked;
    cara2=document.getElementById('rd2Caras').  checked;
    if(esp==true && cara1==false){
        document.getElementById('rdOz3').   disabled=false;
        document.getElementById('rdOz.5').  checked=false;
        document.getElementById('rdOz.5').  disabled=true;
        document.getElementById('rdOz2').   disabled=true;
        document.getElementById('CPTH').    disabled=false;
        document.getElementById('CMPTH').   disabled=false;   
  
    }else if(esp==false && cara1==false){
        document.getElementById('rdOz3').   checked=false;
        document.getElementById('rdOz3').   disabled=true;
        document.getElementById('rdOz.5').  disabled=false;
        document.getElementById('rdOz2').   disabled=false;
        document.getElementById('CPTH').    disabled=false;
        document.getElementById('CMPTH').   disabled=false;   
   
    }else if(esp==true && cara1==true){
        document.getElementById('rdOz2').   checked=false;
        document.getElementById('rdOz2').   disabled=false;
        document.getElementById('rdOz.5').  disabled=true;
        document.getElementById('rdOz3').   checked=false;
        document.getElementById('rdOz3').   disabled=true;
        document.getElementById('CPTH').    disabled=true;
        document.getElementById('CMPTH').   disabled=true;    
    }else if(esp==false && cara1==true){  
        document.getElementById('rdOz2').   disabled=false;
        document.getElementById('rdOz.5').  checked=false;
        document.getElementById('rdOz.5').  disabled=true;
        document.getElementById('rdOz3').   disabled=true;
        document.getElementById('rdOz3').   disabled=true;
        document.getElementById('PTHS').    value="Sin PTH";
        document.getElementById('CPTH').    disabled=true;
        document.getElementById('CMPTH').   disabled=true;   
    }
}


