<?php
error_reporting(0);

    include 'config.php';
    $id=$_GET['editarid'];

    $sql = "select * from usuarios where user_id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $user_id = $row['user_id'];
    $usuario = $row['usuario'];
    $user_email = $row['user_email'];
    $dt_nascimento = $row['dt_nascimento'];
    $curso = $row['curso'];
    $status_user = $row['status_user'];
    $senha = $row['senha'];

    if (isset($_POST['submit'])){

        $user_id = $_POST['user_id'];
        $usuario = $_POST['usuario'];
        $user_email = $_POST['user_email'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $curso = $_POST['curso'];
        $status_user = $_POST['status_user'];
        $senha = $_POST['senha'];


        $sql = "update usuarios set user_id=$id, usuario='$usuario', user_email='$user_email', dt_nascimento='$dt_nascimento', curso='$curso', status_user='$status_user', senha=md5('$senha') where user_id=$id";
        
        $result = mysqli_query ($con, $sql);

        if (!$result){
            die (mysqli_error($con));
        }
    }
  

?>

<script>
  function alerta() {
    window.alert("Cadastro editado com sucesso!");
  }
</script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuario</h1>
</div>
<form class="body row" method="post" action="" onsubmit="alerta()">
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados do Usuário</b></label>
  </div>
  <div class="col-md-6 mb-3">
    <label for="usuario" class="form-label">Login</label>
    <input type="text" required="" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario;?>">
  </div>
  <div class="col-md-6 mb-3">
    <label for="user_email" class="form-label">Data do Exame</label>
    <input type="email" required="" class="form-control" id="user_email" name="user_email" value="<?php echo $user_email;?>">
  </div>
  <div class="col-md-2 mb-3">
    <label for="dt_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?php echo $dt_nascimento;?>">
  </div>
  <div class="col-md-2 mb-3">
    <label for="curso" class="form-label">Curso</label>
    <input type="text" class="form-control" id="curso" name="curso" value="<?php echo $curso;?>">
  </div>
  <div class="col-md-4 mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" value="">
  </div>
  <div class="col-md-4 mb-3">
    <label for="" class="form-label">Confirme sua senha</label>
    <input type="password" class="form-control" id="" name="" value="">
  </div>
  <div class="col-md-12 mb-3">
    <label class="form-check-label" for="status_user">Super Administrador</label>
    <input type="checkbox" class="form-check-input"  role="switch" id="status_user" value="TRUE"  name="status_user">
        <?php

        if (isset($_POST['status_user'])){
        $status_user = $_POST['status_user'];
        }
        else {
        $status_user = FALSE;
        }
        
        ?>
  </div>
  <div class="col-md-12 mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <button type="submit" class="btn btn-secondary"><a href=".?p=usuarios" class="text-light">Voltar</a></button>
  </div>
</form>


