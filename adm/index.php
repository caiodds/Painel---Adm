<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
    <title>Painel Administrador</title>
</head>
<body>
    <form method="POST" action="">
    <h1>Veja abaixo á lista de Reclamação ou Elogio dos Usuários</h1>
    </form>
</body>
</html>
<?php
include('config.php');
    $sql = "SELECT * FROM formulario";
    $res = $con->query($sql);
    $qtd = $res->num_rows;
    if ($qtd > 0) {
            print "<table class='table table-hover table-striped table-bordered' >";
            print"<tr>";
            print"<th>Id</th>";
            print"<th>Nome</th>";
            print"<th>E-mail</th>";
            print"<th>Assunto</th>";
            print"<th>Mensagem</th>";
            print"<th>Ações</th>";
            print"</tr>";
        while ($row = $res->fetch_object()) {
            print"<tr>";
            print"<td>".$row->id."</td>";
            print"<td>". $row->nome."</td>";
            print"<td>". $row->email."</td>"; 
            print"<td>".$row->assunto."</td>";
            print"<td>".$row->mensagem."</td>";
            print"<td>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?acao=excluir&id=".$row->id."';}else{false;}\" class='btn btn-danger'>Excluir</button>
            </td>";

            print"</tr>";
        }
        print"</table>";
    }else{
        print "<p class='alert alert-danger'>Não encontrou resultado</p>";
    }
    switch ($_REQUEST['acao']) {
        case 'excluir':
            $sql = "DELETE  FROM formulario WHERE id=".$_REQUEST["id"];

            $res = $con->query($sql);
            
            if ($res==true) {
                print "<script>alert('Excluido com sucesso');</script>";
                print "<script> location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel Excluir');</script>";
                print "<script> location.href='?page=home.php';</script>";
            }
            break;
    }
?>