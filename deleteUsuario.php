<?php 


include 'config.php';

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];

    $sql="delete from usuarios where user_id=$id";
    $result=mysqli_query($con, $sql);

    if($result){
        header('location: .?p=usuarios');

    }else{
        die (mysqli_error($con));
    }

}

?>