<?php
include_once('conexao.php');
include_once('contador.php');
if(session_status() != PHP_SESSION_ACTIVE)
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(<?php echo $linha1;?>) - Area 2</title>

</head>
<body>
        <p>Olá , <?php echo $_SESSION['area']; ?>
        <?php

        if (isset($_POST["pesquisa"])  != '') {
        } else {
            $query = "SELECT * from notifica_area1 order by id desc limit 40";
            $query_count = "SELECT * from notifica_area1 ";
            $result_count = mysqli_query($conexao, $query_count);
        }
            $result = mysqli_query($conexao, $query);
            @$linha = mysqli_num_rows($result);
            @$linha_count1 = mysqli_num_rows($result_count);

        if ($linha == '') {
            echo "<h3>Não foram encontrados dados cadastrados no banco</h3>";
        } else {
        ?>
            <table class="uk-table uk-table-striped uk-box-shadow-medium resultado" style="font-size:12px;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Assunto</th>
                        <?php
                        while ($res = mysqli_fetch_array($result)) {
                            $nome_enviou = $res["nome_env"];
                            $Assunto = $res["assunto"];
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nome_enviou;  ?> </td>
                        <td><?php echo $Assunto; ?></td>
                     
                    </tr>
                    <?php
                        }
                        ?>
                    </tr>
                    </tr>
                <tfoot>
        <tr><span >
        <td>Notificações:<?php echo $linha ?></td>
        </span></tr>
        </tfoot>
        </tbody>
        </table>
        <?php
        }
        ?>
    <form method="POST">
        <input type="text" placeholder="Assunto" name="Assunto">
        <input type="text" placeholder="Destino" name="Destino">
        <input type="submit" name="enviar">
    </form>
    <?php
    if(isset($_POST["enviar"])){
        $assunto_ = $_POST['Assunto'];
        $destino_ = $_POST['Destino'];
        $enviado = $_SESSION['area'];
        if($destino_ != $_SESSION['area']){
            if($destino_ == "area2")
            {
                $querym = "INSERT INTO notifica_area2 (nome_env, assunto) values ('$enviado','$assunto_')";
                $resultm = mysqli_query($conexao, $querym);

                if($resultm == ''){
                    echo "<script language='javascript'>window.alert('ocorreu um erro ao salvar!'); </script>";
                }
                else{
                    echo "<script language='javascript'>window.alert('Enviada com sucecsso'); </script>";
                }
            }
        }
    }
    ?>
    <p>Destino é quem vai receber a notificação, destino = "area2"
</body>
</html>