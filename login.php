<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, rgb(2, 16, 78), rgb(71, 0, 95));
        }
        div{
            background-color: rgba(5, 5, 5, 0.521);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
       }
       input{
        padding: 15px;
        border: none;
        outline: none;
        font-size: 15px;
       }
       .inputSubmit{
        background-color: blueviolet;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: white;
        font-size: 15px;
       }
       .inputSubmit:hover{
        background-color: rgb(54, 27, 99);
        cursor: pointer;


       }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>

    <div>
        <h1>Login</h1>
        <form action="testeLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha"> 
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>