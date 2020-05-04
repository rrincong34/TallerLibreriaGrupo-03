<?php

require(__DIR__ . '/../modelo/class.Registro.php'); 


//listar todos los usuarios

/* obtener accion de registro usuario */

/* poner funciones con swithc segun accion */

//crear usuario
// modificar usuario

$accion = $_GET['accion'];

switch($accion){
    case 'registrar':
    registrar();
    break;
case 'ingresar':
    ingresar();
    break;
case 'salir':
    salir();
break;
case 'modificar':
    modificar();
break;
}

function registrar(){
   $admin = new Registro();  

   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $correo = $_POST['correo'];
   $clave = $_POST['clave'];
   $direccion = $_POST['direccion'];
   $telefono = $_POST['telefono'];

   $admin->agregarAdmin($nombre, $apellido, $correo, $clave, $direccion, $telefono);

}


function ingresar(){
    $admin = new Registro();
    
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    
    $result = $admin->ingresar($correo, $clave);
    
    if($result != 'error'){
    session_start(); 
    $_SESSION['loggedin'] = true; 
    $_SESSION['user'] = $result; 
    
echo 'ingrese';

    header('Location: ../index.php?res=ingreso');
    } else {
        echo 'Tus datos no son validos';
    }
    }
    
    function salir(){
        $_SESSION['loggedin'] = false; 
        session_destroy(); 
        header('Location: ../index.php?res=salida');
    }
    
    function modificar(){
        $admin= new Registro();

$id = $_POST['idRegistro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$admin->modificarAdmin($id, $nombre, $apellido, $correo, $clave, $direccion, $telefono);


            
    }


?>