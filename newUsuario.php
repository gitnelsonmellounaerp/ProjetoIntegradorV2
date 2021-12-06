<?php
error_reporting(0);

    include 'config.php';

    if (isset($_POST['submit'])){

        $user_id = $_POST['user_id'];
        $usuario = $_POST['usuario'];
        $user_email = $_POST['user_email'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $curso = $_POST['curso'];
        $status_user = $_POST['status_user'];
        $senha = $_POST['senha'];


        $sql = "insert into usuarios (user_id, usuario, user_email, dt_nascimento, curso, status_user, senha) 
          
          values ('$user_id', '$usuario', '$user_email', '$dt_nascimento', '$curso', '$status_user', md5('$senha'))";

        $result = mysqli_query ($con, $sql);

        if (!$result){
            die (mysqli_error($con));
        }
    }
  

?>

<script>
  function alerta() {
    window.alert("Cadastro realizado com sucesso!");
  }
</script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Usuário</h1>
</div>
<form class="body row" method="post" action="" onsubmit="validatePassword()">
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados do usuário</b></label>
  </div>
  <div class="col-md-6 mb-3">
    <label for="usuario" class="form-label">Nome de Login</label>
    <input type="text" required="" class="form-control" id="usuario" name="usuario">
  </div>
  <div class="col-md-6 mb-3">
    <label for="user_email" class="form-label">E-mail do usuário</label>
    <input type="email" required="" class="form-control" id="user_email" name="user_email">
  </div>
  <div class="col-md-2 mb-3">
    <label for="dt_nascimento" class="form-label">Data de nascimento</label>
    <input type="date" required="" class="form-control" id="dt_nascimento" name="dt_nascimento">
  </div>
  <div class="col-md-2 mb-3">
    <label for="curso" class="form-label">Curso do usuário</label>
    <input type="text" required="" class="form-control" id="curso" name="curso">
  </div>
  <div class="col-md-4 mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" required="" value="" class="form-control" id="senha" name="senha">
  </div>
  <div class="col-md-4 mb-3">
    <label for="" class="form-label">Confirme sua senha</label>
    <input type="password" required="" value="" class="form-control" id="confirmaSenha" name="">
  </div>
  <div class="col-md-12 mb-3">
    <label class="form-check-label" for="status_user">Super Administrador</label>
    <input type="checkbox" class="form-check-input" role="switch" value="true"  id="status_user"  name="status_user">
    <?php

    if (isset($_POST['status_user'])){
      $status_user = $_POST['status_user'];
    }
    else {
      $status_user = 0;
    }   

    ?>
  </div>
  <div class="col-md-3 mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
    <button type="submit" class="btn btn-secondary"><a href="?p=usuarios" class="text-light">Voltar</a></button>
  </div>
</form>