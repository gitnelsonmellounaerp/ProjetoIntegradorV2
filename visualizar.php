<?php

include 'config.php';

if(isset($_POST['paciente_id'])){
    $paciente_id =$_POST['paciente_id'];

    $sql = "select * from pacientes where paciente_id=$paciente_id";
    $result = mysqli_query($con, $sql);
    $response = array();

    while ($row=mysqli_fetch_assoc($result)){
        $response = $row;

    }

    echo json_encode($response);
}else {
    $response ['status'] = 200;
    $response ['message'] = "Invalido ou dado não encontrado.";
}

?>

<?php
    $con->close();
?>