<?php
session_start();
    include('./config.php');

    if($con->connect_error){
        die("Erro na conexão: ".$con->connect_error);
    }
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exames</h1>
        <a href=".?p=newExame" type="button" class="btn btn-primary">Cadastrar</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <div class="body row">
                <div class="col-md-4 mb-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Busca por nome">
                </div>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th><i></i> Nome do Paciente</th>
                    <th><i></i> Nome do Examinador</th>
                    <th><i></i> Data do Exame</th>
                    <th><i></i></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from exames order by paciente_nome";
                $result = mysqli_query($con, $sql);
                
                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
                        $exame_id = $row['exame_id'];
                        $paciente_nome = $row['paciente_nome'];
                        $examinador = $row['examinador'];
                        $dt_exame = $row['dt_exame'];
                        $glicemia = $row['glicemia'];
                        $colesterol = $row['colesterol'];
                        $pressao = $row['pressao'];
                        echo '
                        <tr>
                        <td>'.$paciente_nome.'</td>
                        <td>'.$examinador.'</td>
                        <td>'.$dt_exame.'</td>
                        <td>
                        
                        <button type="button" onclick="GetDetails('.$exame_id.')" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Visualizar</button>
                        ⠀⠀
                        <button class="btn btn-primary" title="Editar" ><a href=".?p=editExame&editarid='.$exame_id.'" class="text-light">EDITAR</a></button>
                        ⠀⠀
                        <button class="btn btn-danger" color="red" title="Remover" ><a href="deleteExame.php?deleteid='.$exame_id.'" class="text-light">DELETAR</a></button>
                        </td>

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
        <h5 class="modal-title" id="exampleModalLabel">Dados Exame</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <fieldset disabled>
                <legend>DADOS COMPLETOS DO EXAME</legend>
                <div class="mb-3">
                <label for="mostrarNome" class="form-label">Nome do Paciente</label>
                <input type="text" id="mostrarNome" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarExaminador" class="form-label">Nome do Examinador</label>
                <input type="text" id="mostrarExaminador" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarData" class="form-label">Data de Nascimento</label>
                <input type="text" id="mostrarData" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarGlicemia" class="form-label">Glicemia</label>
                <input type="text" id="mostrarGlicemia" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarColesterol" class="form-label">Colesterol</label>
                <input type="text" id="mostrarColesterol" class="form-control" placeholder="Campo Vazio">
                </div>
                <div class="mb-3">
                <label for="mostrarPressao" class="form-label">Pressão Arterial</label>
                <input type="text" id="mostrarPressao" class="form-control" placeholder="Campo Vazio">
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
        function GetDetails(exame_id){

            $('#hiddendata').val(exame_id);

            $.post("visualizarExame.php", {exame_id:exame_id}, function (data, status){

                var exame_id=JSON.parse(data);

                $('#mostrarNome').val(exame_id.paciente_nome);
                $('#mostrarExaminador').val(exame_id.examinador);
                $('#mostrarData').val(exame_id.dt_exame);
                $('#mostrarGlicemia').val(exame_id.glicemia);
                $('#mostrarColesterol').val(exame_id.colesterol);
                $('#mostrarPressao').val(exame_id.pressao);

            });

            ('#visualiar').modal("show");
        }
    </script>

<?php
    $con->close();
?>