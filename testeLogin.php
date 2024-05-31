<?php
    include_once('config.php');
    //print_r($_REQUEST)
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
         //Acessa
         
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        //print_r('Email:' . $email);
        // print_r('<br>');
        //print_r('Senha:' . $senha);
        $sql= "SELECT * FROM usuarios WHERE email= '$email' and senha=' $senha'";
        $result = $conexao->query($sql);

        print_r($result);
    }
    else{
        //Não acessa
        header('Location: login.php');
    }


?>