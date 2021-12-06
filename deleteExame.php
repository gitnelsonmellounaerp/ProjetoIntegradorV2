<?php 


include 'config.php';

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $sql="delete from exames where exame_id=$id";
    $result=mysqli_query($con, $sql);

    if($result){
        header('location: .?p=exames');

    }else{
        die (mysqli_error($con));
    }

}

?>