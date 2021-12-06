<?php
session_start();
    include('./config.php');

    if($con->connect_error){
        die("Erro na conexão: ".$con->connect_error);
    }
?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
        <a href=".?p=newUsuario" type="button" class="btn btn-primary">Cadastrar</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><i></i> Nome de login</th>
                    <th><i></i> Curso do Usuário</th>
                    <th><i></i></th>
                </tr>
            </thead>
            <tbody>
            <?php
                 $sql = "select * from usuarios order by user_email";
                 $result = mysqli_query($con, $sql);
                 
                 if($result) {
                     while($row = mysqli_fetch_assoc($result)){
                         $user_id = $row['user_id'];
                         $usuario = $row['usuario'];
                         $user_email = $row['user_email'];
                         $dt_nascimento = $row['dt_nascimento'];
                         $curso = $row['curso'];
                         $status_user = $row['status_user'];
                         $senha = $row['senha'];
                         echo '
                         <tr>
                         <td>'.$usuario.'</td>
                         <td>'.$curso.'</td>
 
                         <td>
                         
                         ⠀⠀
                         <button class="btn btn-primary" title="Editar" ><a href=".?p=editUsuario&editarid='.$user_id.'" class="text-light">EDITAR</a></button>
                         ⠀⠀
                         <button class="btn btn-danger" color="red" title="Remover" ><a href="deleteUsuario.php?deleteid='.$user_id.'" class="text-light">DELETAR</a></button>
                         </td>
 
                         </tr>';
                     }
                 } 
                ?>
            </tbody>
        </table>
    </div>
<?php
    $con->close();
?>