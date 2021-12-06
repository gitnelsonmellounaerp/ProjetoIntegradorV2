<?php 


include 'config.php';

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $sql="delete from pacientes where paciente_id=$id";
    $result=mysqli_query($con, $sql);

    if($result){
        header('location: pacientes.php');
    }else{
        die (mysqli_error($con));
    }

}





?>