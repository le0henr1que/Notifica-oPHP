<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!--Formulário de autenticar para saber o nivel-->
    <form method="POST">
        <input type="text" name="area" placeholder="Area">
        <input type="text" name="senha" placeholder="Seha">
        <input type="submit" value="verificar">
    </form>
    <p>Area 1 - Area: area1, senha: 123
    <p>Area 2 - Area: area2, senha: 123
        <?php
        //verificar se existe uma session
        if(session_status() !== PHP_SESSION_ACTIVE){
            //starta a session
            session_start();
        }


        @$area = $_POST['area'];
        @$senha = $_POST['senha'];


        if($area == 'area1' && $senha == '123')
        {
            $_SESSION['area'] = $area;
            $_SESSION['senha'] = $senha;
            header('Location:area1.php');
        }

        if($area == 'area2' && $senha == '123')
        {
            $_SESSION['area'] = $area;
            $_SESSION['senha'] = $senha;
            header('Location:area2.php');
        }
    
        ?>
</body>
</html>