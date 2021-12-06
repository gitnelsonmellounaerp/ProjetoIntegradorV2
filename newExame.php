<?php
error_reporting(0);

    include 'config.php';

    if (isset($_POST['submit'])){

        $exame_id = $_POST['exame_id'];
        $paciente_nome = $_POST['paciente_nome'];
        $examinador = $_POST['examinador'];
        $dt_exame = $_POST['dt_exame'];
        $glicemia = $_POST['glicemia'];
        $colesterol = $_POST['colesterol'];
        $pressao = $_POST['pressao'];


        $sql = "insert into exames (exame_id, paciente_nome, examinador, dt_exame, glicemia, colesterol, pressao) 
          
          values ('$exame_id', '$paciente_nome', '$examinador', '$dt_exame', '$glicemia', '$colesterol', '$pressao')";

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
    <h1 class="h2">Novo Exame</h1>
</div>
<form class="body row" method="post" action="" onsubmit="alerta()">
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados do Exame</b></label>
  </div>
  <div class="col-md-5 mb-3">
    <label for="paciente_nome" class="form-label">Nome do Paciente</label>
    <input type="text" required="" class="form-control" id="paciente_nome" name="paciente_nome">
  </div>
  <div class="col-md-5 mb-3">
    <label for="examinador" class="form-label">Nome do Examinador</label>
    <input type="text" required="" class="form-control" id="examinador" name="examinador">
  </div>
  <div class="col-md-2 mb-3">
    <label for="dt_exame" class="form-label">Data do Exame</label>
    <input type="date" required="" class="form-control" id="dt_exame" name="dt_exame">
  </div>
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados Clínicos</b></label>
  </div>
  <div class="col-md-1 mb-5">
    <label for="glicemia" class="form-label">Glicemia</label>
    <input type="text" class="form-control" id="glicemia" name="glicemia">
  </div>
  <div class="col-md-1 mb-5">
    <label for="colesterol" class="form-label">Colesterol</label>
    <input type="text" class="form-control" id="colesterol" name="colesterol">
  </div>
  <div class="col-md-2 mb-5">
    <label for="pressao" class="form-label">Pressão Arterial</label>
    <input type="text" class="form-control" id="pressao" name="pressao">
  </div>
  <div class="col-md-8 mb-5"></div>
  <div class="col-md-8 mb-5">
    <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
    <button type="submit" class="btn btn-secondary"><a href="?p=exames" class="text-light">Voltar</a></button>
  </div>
</form>



