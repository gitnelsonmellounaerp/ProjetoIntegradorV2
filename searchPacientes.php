<?php
session_start();
    include('./config.php');

    if($con->connect_error){
        die("Erro na conexão: ".$con->connect_error);
    }
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pacientes</h1>
        <a href=".?p=new" type="button" class="btn btn-primary">Cadastrar</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <form method="post" action=".?p=searchPacientes">
                <div class="body row">
                    <div class="col-md-4 mb-3">
                        <input class="form-control" name="buscaNome" type="text" placeholder="Busca por nome">
                    </div>
                    <div class="col-md-1 mb-3">
                        <input class="btn btn-primary" type="submit" name="submit" placeholder="Busca">
                    </div>
                </div>
            </form>
            <thead class="thead-dark">
                <tr>
                    <th><i></i> Nome do Paciente</th>
                    <th><i></i> Data de Nascimento</th>
                    <th><i></i> Sexo</th>
                    <th><i></i></th>
                </tr>
            </thead>
            <tbody>
            <?php

     

            if (isset($_POST['submit'])){

                $search = mysqli_real_escape_string($con, $_POST['buscaNome']);
                $sql = "SELECT * FROM pacientes WHERE paciente_nome LIKE '%$search%'";
                $result = mysqli_query($con, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $paciente_id = $row['paciente_id'];
                        $paciente_nome = $row['paciente_nome'];
                        $dt_nasc = $row['dt_nasc'];
                        $sexo = $row['sexo'];
                        $endereco = $row['endereco'];
                        $numero = $row['numero'];
                        $complemento = $row['complemento'];
                        $bairro = $row['bairro'];
                        $cidade = $row['cidade'];
                        $cep = $row['cep'];
                        $email = $row['email'];
                        $celular = $row['celular'];
                        $telefone = $row['telefone'];
                        $peso = $row['peso'];
                        $altura = $row['altura'];
                        $hipertensao = $row['hipertensao'];
                        $diabetes = $row['diabetes'];
                        $fumante = $row['fumante'];
                        $cardiaco = $row['cardiaco'];
                        $observacoes = $row['observacoes'];
                        $medicacao = $row['medicacao'];
                        echo '
                        <tr>
                        <td>'.$paciente_nome.'</td>
                        <td>'.$dt_nasc.'</td>
                        <td>'.$sexo.'</td>
    
                        <td>
                        
                        <button type="button" onclick="GetDetails('.$paciente_id.')" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Visualizar</button>⠀⠀
    
                        <button class="btn btn-primary" title="Editar" ><a href=".?p=editar&editarid='.$paciente_id.'" class="text-light">EDITAR</a></button>
                        ⠀⠀
                        <button class="btn btn-danger" color="red" title="Remover" ><a href="delete.php?deleteid='.$paciente_id.'" class="text-light">DELETAR</a></button>
                        </td>
    
                        </tr>';
                        

                    }


                } else {
                    echo '<tr>
                    <td>Sem Resultados</td>
                    </tr>';
                }


            }




            ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" id="visualiar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <fieldset disabled>
                <legend>DADOS COMPLETOS PACIENTE</legend>
                <div class="mb-3">
                <label for="mostrarNome" class="form-label">Nome Completo</label>
                <input type="text" id="mostrarNome" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarSexo" class="form-label">Sexo</label>
                <input type="text" id="mostrarSexo" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarEndereco" class="form-label">Endereco</label>
                <input type="text" id="mostrarEndereco" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarNumero" class="form-label">Numero</label>
                <input type="text" id="mostrarNumero" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarComplemento" class="form-label">Complemento</label>
                <input type="text" id="mostrarComplemento" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarBairro" class="form-label">Bairro</label>
                <input type="text" id="mostrarBairro" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarCidade" class="form-label">Cidade</label>
                <input type="text" id="mostrarCidade" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarCep" class="form-label">Cep</label>
                <input type="text" id="mostrarCep" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarEmail" class="form-label">E-mail</label>
                <input type="text" id="mostrarEmail" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarCelular" class="form-label">Celular</label>
                <input type="text" id="mostrarCelular" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarTelefone" class="form-label">Telefone</label>
                <input type="text" id="mostrarTelefone" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarPeso" class="form-label">Peso</label>
                <input type="text" id="mostrarPeso" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarAltura" class="form-label">Altura</label>
                <input type="text" id="mostrarAltura" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarObservacoes" class="form-label">Observações</label>
                <input type="text" id="mostrarObservacoes" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarMedicacao" class="form-label">Medicação</label>
                <input type="text" id="mostrarMedicacao" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarDt" class="form-label">Data de Nascimento</label>
                <input type="text" id="mostrarDt" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarHiper" class="form-label">Tem hipertensão?</label>
                <?php 
                
                    if ($hipertensao === 1){
                        echo '
                        <input type="text" id="mostrarHiper" class="form-control" placeholder="Campo Vazio" value="Sim.">
                        
                        '
                    ;}else {
                        echo '
                        <input type="text" id="mostrarHiper" class="form-control" placeholder="Campo Vazio" value="Não.">
                        '
                    ;}
                ?>
                </div>

                <div class="mb-3">
                <label for="mostrarFumante" class="form-label">É Fumante?</label>
                <?php 
                
                    if ($fumante == 1){
                        echo '
                        <input type="text" id="mostrarFumante" class="form-control" placeholder="Campo Vazio" value="Sim.">
                        
                        '
                    ;}else {
                        echo '
                        <input type="text" id="mostrarFumante" class="form-control" placeholder="Campo Vazio" value="Não.">
                        '
                    ;}
                ?>
                </div>
                <div class="mb-3">
                <label for="mostrarCardiaco" class="form-label">Tem problemas cardíacos?</label>
                <?php 
                
                    if ($cardiaco == 1){
                        echo '
                        <input type="text" id="mostrarCardiaco" class="form-control" placeholder="Campo Vazio" value="Sim.">
                        
                        '
                    ;}else {
                        echo '
                        <input type="text" id="mostrarCardiaco" class="form-control" placeholder="Campo Vazio" value="Não.">
                        '
                    ;}
                ?>
                </div>
                <div class="mb-3">
                <label for="mostrarDiabetes" class="form-label">Tem Diabetes?</label>
                <?php 
                
                    if ($diabetes == 1){
                        echo '
                        <input type="text" id="mostrarDiabetes" class="form-control" placeholder="Campo Vazio" value="Sim.">
                        
                        '
                    ;}else {
                        echo '
                        <input type="text" id="mostrarDiabetes" class="form-control" placeholder="Campo Vazio" value="Não.">
                        '
                    ;}
                ?>
                </div>
                </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>

    <script>
        var myModal = document.getElementById('visualizar');
        var myInput = document.getElementById('myInput');

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })

        // ajax modal
        function GetDetails(paciente_id){

            $('#hiddendata').val(paciente_id);

            $.post("visualizar.php", {paciente_id:paciente_id}, function (data, status){

                var paciente_id=JSON.parse(data);

                $('#mostrarNome').val(paciente_id.paciente_nome);
                $('#mostrarSexo').val(paciente_id.sexo);
                $('#mostrarEndereco').val(paciente_id.endereco);
                $('#mostrarNumero').val(paciente_id.numero);
                $('#mostrarComplemento').val(paciente_id.complemento);
                $('#mostrarBairro').val(paciente_id.bairro);
                $('#mostrarCidade').val(paciente_id.cidade);
                $('#mostrarCep').val(paciente_id.cep);
                $('#mostrarEmail').val(paciente_id.email);
                $('#mostrarCelular').val(paciente_id.celular);
                $('#mostrarTelefone').val(paciente_id.telefone);
                $('#mostrarPeso').val(paciente_id.peso);
                $('#mostrarAltura').val(paciente_id.altura);
                $('#mostrarObservacoes').val(paciente_id.observacoes);
                $('#mostrarMedicacao').val(paciente_id.medicacao);
                $('#mostrarDt').val(paciente_id.dt_nasc);

                if (paciente_id.hipertensao == 1){
                    document.getElementById("mostrarHiper").value = "Sim";
                }else {
                    document.getElementById("mostrarHiper").value = "Não";
                }

                if (paciente_id.fumante == 1){
                    document.getElementById("mostrarFumante").value = "Sim";
                }else {
                    document.getElementById("mostrarFumante").value = "Não";
                }
                if (paciente_id.cardiaco == 1){
                    document.getElementById("mostrarCardiaco").value = "Sim";
                }else {
                    document.getElementById("mostrarCardiaco").value = "Não";
                }
                if (paciente_id.diabetes == 1){
                    document.getElementById("mostrarDiabetes").value = "Sim";
                }else {
                    document.getElementById("mostrarDiabetes").value = "Não";
                }


            });

            ('#visualiar').modal("show");
        }
    </script>

    <?php
    $con->close();
?>

