<?php
error_reporting(0);

    include 'config.php';
    $id=$_GET['editarid'];

    $sql = "select * from exames where exame_id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $exame_id = $row['exame_id'];
    $paciente_nome = $row['paciente_nome'];
    $dt_exame = $row['dt_exame'];
    $glicemia = $row['glicemia'];
    $colesterol = $row['colesterol'];
    $pressao = $row['pressao'];

    if (isset($_POST['submit'])){

    $exame_id = $_POST['exame_id'];
    $paciente_nome = $_POST['paciente_nome'];
    $dt_exame = $_POST['dt_exame'];
    $glicemia = $_POST['glicemia'];
    $colesterol = $_POST['colesterol'];
    $pressao = $_POST['pressao'];


        $sql = "update exames set exame_id=$id, paciente_nome='$paciente_nome', dt_exame='$dt_exame', glicemia='$glicemia', colesterol='$colesterol', pressao='$pressao' where exame_id=$id";
        
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
    <h1 class="h2">Editar Exame</h1>
</div>
<form class="body row" method="post" action="" onsubmit="alerta()">
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados do Exame</b></label>
  </div>
  <div class="col-md-10 mb-3">
    <label for="paciente_nome" class="form-label">Nome do paciente</label>
    <input type="text" required="" class="form-control" id="paciente_nome" name="paciente_nome" value="<?php echo $paciente_nome;?>">
  </div>
  <div class="col-md-2 mb-3">
    <label for="dt_exame" class="form-label">Data do Exame</label>
    <input type="date" required="" class="form-control" id="dt_exame" name="dt_exame" value="<?php echo $dt_exame;?>">
  </div>
  <div class="col-md-1 mb-3">
    <label for="glicemia" class="form-label">Glicemia</label>
    <input type="text" class="form-control" id="glicemia" name="glicemia" value="<?php echo $glicemia;?>">
  </div>
  <div class="col-md-1 mb-3">
    <label for="colesterol" class="form-label">Colesterol</label>
    <input type="text" class="form-control" id="colesterol" name="colesterol" value="<?php echo $colesterol;?>">
  </div>
  <div class="col-md-2 mb-3">
    <label for="pressao" class="form-label">Pressão Arterial</label>
    <input type="text" class="form-control" id="pressao" name="pressao" value="<?php echo $pressao;?>">
  </div>
  <div class="col-md-8 mb-3"></div>
  <div class="col-md-12 mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <button type="submit" class="btn btn-secondary"><a href=".?p=exames" class="text-light">Voltar</a></button>
  </div>
</form>


