<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];

            $sql = "INSERT INTO usuarios(nome,email,senha,data_nasc) VALUES ('{$nome}','{$email}','{$senha}','{$data_nasc}')";
            $res = $con->query($sql);
            

            if ($res==true) {
                print "<script>alert('Usuário cadastrado com sucesso');</script>";
                print "<script> location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Usuário cadastrado com sucesso');</script>";
                print "<script> location.href='?page=home.php';</script>";
            }
            break;
        
        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data_nasc"];

            $sql = "UPDATE usuarios SET
            
            nome='{$nome}',
            email='{$email}',
            senha='{$senha}',
            data_nasc='{$data_nasc}'
            WHERE
            id=".$_REQUEST["id"];

            $res = $con->query($sql);
            
            if ($res==true) {
                print "<script>alert('Editado com sucesso');</script>";
                print "<script> location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possivel atualizar');</script>";
                print "<script> location.href='?page=home.php';</script>";
            }
            break;
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
        default:
           
            break;
    }
    switch (@$_REQUEST["page"]) {
        case 'novo':
       include("novo-usuario.php");
       break;

   case 'listar':
       include("listar-usuario.php");
       break;
   case 'salvar':
       include('salvar-usuario.php');
       break;
   case 'editar':
           include('editar-usuario.php');
           break;
   }

?>