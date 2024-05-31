<?php
   if(isset($_POST['submit'])){
    //print_r('Nome:' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email:' . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone' . $_POST['telefone']);
    include_once('config.php');

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];

    $result= mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone)VALUES('$nome','$email','$telefone')");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
      body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, rgb(2, 16, 78), rgb(71, 0, 95));
      }  
      .box{
        color: white;
        position: absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%,-50%);
        background-color: rgba(0, 0, 0, 0.8);
        padding: 15px;
        border-radius: 15px;
        width: 20%;

      }
      fieldset{
        border: 3px solid blueviolet;
      }
      legend{
        border: 1px solid blueviolet;
        padding: 10px;
        text-align: center;
        background-color: blueviolet;
        border-radius: 8px;
        
      }
      .inputBox{

        position: relative;
      }
      .inputUser{
        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        width: 100%;
        letter-spacing: 2px;
      }
     .labelInput{
        position: absolute;
       
        pointer-events: none;
        transition: .5s;
     }
     .inputUser:focus ~ .labelInput{
      
        font-size: 12px;
     }
     #submit{
        background-color: blueviolet;
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor:pointer;
        border-radius: 10px;

     }
     #submit:hover{
      background-color: rgb(54, 27, 99);
     }
    </style>

</head>
<body>
  <a href="home.php">Voltar</a>
    <div  class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br>
                <div class:"inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>                 
                </div>
                <br><br>
                <div class:"inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>                 
                </div>
                <br><br>         
                <div class:"inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>                     
                </div>
                <br><br>         
                <div class:"inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>                     
                </div>
                <br><br>
                  
                <input type="submit" name="submit" id="submit">
            
            </fieldset>

        </form>

    </div>
</body>
</html>