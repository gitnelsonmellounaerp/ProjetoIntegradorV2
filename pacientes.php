<?php

include 'config.php';
    
?>

<html lang="pt-br">



<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

<body>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pacientes</h1>
        <a href="new.php" type="button" class="btn btn-primary">Cadastrar</a>
    </div>


        <table class="table table-striped table-sm display" id="example">
            <thead class="thead-dark">
                <tr>
                    <th>NOME</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>SEXO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from pacientes order by paciente_id";
                $result = mysqli_query($con, $sql);
        //        $row = mysqli_fetch_assoc($result);
                
                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
                        $paciente_id = $row['paciente_id'];
                        $paciente_nome = $row['paciente_nome'];
                        $dt_nasc = $row['dt_nasc'];
                        $sexo = $row['sexo'];
                        $endereco = $row['endereco'];
                        $numero = $row['numero'];
                        $complemento = $row['complemento'];
                        $bairro = $row['bairro'];
                        $cidade = $row['complemento'];
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
                        
                        ⠀⠀
                        <button class="btn btn-primary" title="Editar" ><a href="editar.php?editarid='.$paciente_id.'" class="text-light">EDITAR</a></button>
                        ⠀⠀
                        <button class="btn btn-danger" color="red" title="Remover" ><a href="delete.php?deleteid='.$paciente_id.'" class="text-light">DELETAR</a></button>
                        </td>

                        </tr>';
                    }
                } 
            ?>



            </tbody>
            <tfoot>
            <tr>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>SEXO</th>
                <th></th>
            </tr>
            </tfoot>
        </table>

</body>


</html>

