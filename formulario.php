<?php



$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$ciudad = $_POST["ciudad"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];



$error = '';

//VALIDANDO NOMBRE
if (empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre==''){
        $error .= 'Nombre está vacio</br>';
    }
}

//VALIDANDO TELEFONO
if (empty($_POST["telefono"])){
    $error = 'Ingresa un telefono </br>';
}else{
    $telefono = $_POST["telefono"];
    $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
    $telefono = trim($telefono);
    if($telefono==''){
        $error .= 'Telefono está vacio</br>';
    }
}

//VALIDANDO CIUDAD
if (empty($_POST["ciudad"])){
    $error = 'Ingresa un ciudad </br>';
}else{
    $ciudad = $_POST["ciudad"];
    $ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING);
    $ciudad = trim($ciudad);
    if($nombre==''){
        $error .= 'Ciudad está vacio</br>';
    }
}
//VALIDANDO E-MAIL
if (empty($_POST["email"])){
    $error .= 'Ingresa un E-mail</br>';
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail verdadero</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}
//VALIDANDO MENSAJE
if (empty($_POST["mensaje"])){
    $error .= 'Ingresa un mensaje </br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje==''){
        $error .= 'Mensaje está vacio</br>';
    }
}

//CUERPO DEL MENSAJE
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "\n";

$cuerpo .= "Telefono: ";
$cuerpo .= $telefono;
$cuerpo .= "\n";

$cuerpo .= "Ciudad: ";
$cuerpo .= $ciudad;
$cuerpo .= "\n";
 
$cuerpo .= "Email: ";
$cuerpo .= $email;
$cuerpo .= "\n";
 
$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;


//DIRECCIÓN
$enviarA = 'hello@glouphi.com'; //REEMPLAZAR CON TU CORREO ELECTRÓNICO
$asunto = 'Nuevo mensaje de mi sitio web';

//ENVIAR CORREO
if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}

?>