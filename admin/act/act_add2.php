<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $cupo = $_POST['cupo'];
    $id_inter = $_POST['id_inter'];
    $back = $_POST['back'];
    $disp = $_POST['disp'];

    $res = $back - $cupo;
    $libre = $disp - $res;
        
    if($libre>=0){
        $query = "UPDATE activid
        SET name_act ='$name',
        description ='$last',
        cupo = '$cupo',
        disp = '$libre',
        cred_act = '$cred',
        id_inter = '$id_inter'
        WHERE id_act = '$id'";

        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error al actualizar la información!'. mysqli_error($con)); 
        }
        echo"Datos actualizados correctamente!";
    }else if($libre<0){
        $query = "UPDATE activid
        SET name_act ='$name',
        description ='$last',
        cred_act = '$cred',
        id_inter = '$id_inter'
        WHERE id_act = '$id'";

        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error al actualizar la información!'. mysqli_error($con)); 
        }
        echo"El cupo que quieres asignar sobrepasa los lugares disponibles. 
        Los demás datos se actualizaron sin inconvenientes.";
    }
?>