<?php
error_reporting(0);

    include 'config.php';

    if (isset($_POST['submit'])){

        $paciente_id = $_POST['paciente_id'];
        $paciente_nome = $_POST['paciente_nome'];
        $dt_nasc = $_POST['dt_nasc'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $telefone = $_POST['telefone'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $hipertensao = $_POST['hipertensao'];
        $diabetes = $_POST['diabetes'];
        $fumante = $_POST['fumante'];
        $cardiaco = $_POST['cardiaco'];
        $observacoes = $_POST['observacoes'];
        $medicacao = $_POST['medicacao'];


        $sql = "insert into pacientes (paciente_id, paciente_nome, dt_nasc, sexo, endereco, numero, complemento, bairro, cidade, cep, email, celular, telefone, peso, altura, hipertensao, diabetes, fumante, cardiaco, observacoes, medicacao) 
          
          values ('$paciente_id', '$paciente_nome', '$dt_nasc', '$sexo', 
          '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$cep', 
          '$email', '$celular', '$telefone', '$peso', '$altura', '$hipertensao', 
          '$diabetes', '$fumante', '$cardiaco', '$observacoes', '$medicacao')";

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
    <h1 class="h2">Novo Paciente</h1>
</div>
<form class="body row" method="post" action=".?p=pacientes" onsubmit="alerta()">
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados do Paciente</b></label>
  </div>
  <div class="col-md-8 mb-3">
    <label for="paciente_nome" class="form-label">Nome do paciente</label>
    <input type="text" required="" class="form-control" id="paciente_nome" name="paciente_nome">
  </div>
  <div class="col-md-2 mb-3">
    <label for="dt_nasc" class="form-label">Data de nascimento</label>
    <input type="date" required="" class="form-control" id="dt_nasc" name="dt_nasc">
  </div>
  <div class="col-md-2 mb-3">
    <label for="sexo" class="form-label">Sexo</label>
    <input type="text" required="" class="form-control" list="sexo" id="sexo" name="sexo">
    <datalist id="sexo">
      <option value="Feminino">
      <option value="Masculino">
    </datalist>
  </div>
  <div class="col-md-7 mb-3">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" required="" class="form-control" id="endereco" name="endereco">
  </div>
  <div class="col-md-1 mb-3">
    <label for="numero" class="form-label">Numero</label>
    <input type="text" required="" class="form-control" id="numero" name="numero">
  </div>
  <div class="col-md-4 mb-3">
    <label for="complemento" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="complemento" name="complemento">
  </div>
  <div class="col-md-4 mb-3">
    <label for="bairro" class="form-label">Bairro</label>
    <input type="text" required="" class="form-control" id="bairro" name="bairro">
  </div>
  <div class="col-md-4 mb-3">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" required="" class="form-control" id="cidade" name="cidade">
  </div>
  <div class="col-md-4 mb-3">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" required="" class="form-control" id="cep" name="cep">
  </div>
  <div class="col-md-4 mb-5">
    <label for="email" class="form-label">e-mail</label>
    <input type="email" required="" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-4 mb-5">
    <label for="celular" class="form-label">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular">
  </div>
  <div class="col-md-4 mb-5">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone">
  </div>
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados antropométricos</b></label>
  </div>
  <div class="col-md-1 mb-5">
    <label for="peso" class="form-label">Peso</label>
    <input type="text" class="form-control" id="peso" name="peso">
  </div>
  <div class="col-md-1 mb-5">
    <label for="altura" class="form-label">Altura</label>
    <input type="text" class="form-control" id="altura" name="altura">
  </div>
  <div class="col-md-10 mb-5"></div>
  <div class="col-md-12 mb-3">
    <label class="form-label"><b>Dados Clínicos</b></label>
  </div>
  <div class="col-md-3 mb-3">
    <label class="form-check-label" for="hipertensao">Hipertensão</label>
    <input type="checkbox" class="form-check-input"  role="switch" id="hipertensao" value="1"  name="hipertensao">
    <?php

    if (isset($_POST['hipertensao'])){
      $hipertensao = $_POST['hipertensao'];
    }
    else {
      $hipertensao = 0;
    }
    
    ?>

  </div>
  <div class="col-md-3 mb-3">
    <label class="form-check-label" for="diabetes">Diabetes</label>
    <input type="checkbox" class="form-check-input"  role="switch" value="1"  id="diabetes"  name="diabetes">
    <?php

    if (isset($_POST['diabetes'])){
      $diabetes = $_POST['diabetes'];
    }
    else {
      $diabetes = 0;
}

?>
  </div>
  <div class="col-md-3 mb-3">
    <label class="form-check-label" for="fumante">Fumante</label>
    <input type="checkbox" class="form-check-input" role="switch" value="1"  id="fumante"  name="fumante">
    <?php

    if (isset($_POST['fumante'])){
      $fumante = $_POST['fumante'];
    }
    else {
      $fumante = 0;
}

?>
  </div>
  <div class="col-md-3 mb-3">
    <label class="form-check-label" for="cardiaco">Doença Cardíaca</label>
    <input type="checkbox" class="form-check-input" role="switch" value="1"  id="cardiaco"  name="cardiaco">
    <?php

    if (isset($_POST['cardiaco'])){
      $cardiaco = $_POST['cardiaco'];
    }
    else {
      $cardiaco = 0;
}

?>
  </div>
  <div class="col-md-6 mb-3">
    <label for="observacoes" class="form-label">Observações</label>
    <input type="text" class="form-control" id="observacoes" name="observacoes">
  </div>
  <div class="col-md-6 mb-3">
    <label for="medicacao" class="form-label">Medicações em uso</label>
    <input type="text" class="form-control" id="medicacao" name="medicacao">
  </div>
  <div class="col-md-3 mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
    
  </div>
</form>
<button type="submit" class="btn btn-secondary"><a href="?p=pacientes" class="text-light">Voltar</a></button>

<?php
    $con->close();
?>



