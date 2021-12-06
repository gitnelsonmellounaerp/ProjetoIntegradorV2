<?php

include 'config.php';

if(isset($_POST['exame_id'])){
    $exame_id =$_POST['exame_id'];

    $sql = "select * from exames where exame_id=$exame_id";
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