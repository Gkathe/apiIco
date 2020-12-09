<?php

include 'bd/BD.php';

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD']=='GET'){
   
        $query="select count(id) from beneficiario_donante";
        $resultado=metodoGet($query);
        echo json_encode($resultado->fetchAll()); 
    header("HTTP/1.1 200 OK");
    exit();
}

if($_POST['METHOD']=='POST'){
    unset($_POST['METHOD']);
    $email=$_POST['email'];
    $query="insert into beneficiario_donante (email) values ('$email')";
    $queryAutoIncrement="select MAX(id) as id from beneficiario_donante";
    $resultado=metodoPost($query, $queryAutoIncrement);
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();
}

// if($_POST['METHOD']=='PUT'){
//     unset($_POST['METHOD']);
//     $id=$_GET['id'];
//     $nombre=$_POST['nombre'];
//     $lanzamiento=$_POST['lanzamiento'];
//     $desarrollador=$_POST['desarrollador'];
//     $query="UPDATE frameworks SET nombre='$nombre', lanzamiento='$lanzamiento', desarrollador='$desarrollador' WHERE id='$id'";
//     $resultado=metodoPut($query);
//     echo json_encode($resultado);
//     header("HTTP/1.1 200 OK");
//     exit();
// }

// if($_POST['METHOD']=='DELETE'){
//     unset($_POST['METHOD']);
//     $id=$_GET['id'];
//     $query="DELETE FROM frameworks WHERE id='$id'";
//     $resultado=metodoDelete($query);
//     echo json_encode($resultado);
//     header("HTTP/1.1 200 OK");
//     exit();
// }

header("HTTP/1.1 400 Bad Request");


?>
