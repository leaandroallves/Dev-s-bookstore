<?php
session_start();
    //print_r($_SESSION);
    if ((!isset($_SESSION["email"]) == true) and (!isset($_SESSION['senha']) ==true)){
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        header("Location: login.php");
    }
    $logado= $_SESSION['email']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev`s bookstore</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgb(2, 16, 78), rgb(71, 0, 95));
            margin: 0;
            padding: 20px;
            
        }

        h1 {
            text-align: center;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: white;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: blueviolet;
        border: none;
        padding: 10px;
        width: 15%;
        border-radius: 20px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        }

        button:hover {
            background-color: rgb(54, 27, 99);
            cursor: pointer;
        }

        #livros {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .livro {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgb(54, 27, 99);
        }

        .livro img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .comprar {
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .comprar:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Dev`s bookstore</h1>
    <label for="termo">Digite um livro:</label>
    <input type="text" id="termo">
    <button onclick="pesquisarLivros()">Pesquisar</button>
    <div id="livros"></div>

    <script>
        // Função para pesquisar livros com base no termo de pesquisa
        function pesquisarLivros() {
            var termo = document.getElementById('termo').value;
            var url = 'https://www.googleapis.com/books/v1/volumes?q=' + termo;

            // Fazendo a requisição
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Manipulando os dados recebidos
                    var livrosDiv = document.getElementById('livros');
                    livrosDiv.innerHTML = ''; // Limpa o conteúdo anterior

                    // Exibindo os livros na página
                    if (data.items && data.items.length > 0) {
                        data.items.forEach(item => {
                            var livro = item.volumeInfo;
                            var imagem = livro.imageLinks ? livro.imageLinks.thumbnail : 'https://via.placeholder.com/128x192.png?text=No+Image'; // URL da imagem do livro ou imagem padrão
                            var autores = livro.authors ? livro.authors.join(', ') : 'Desconhecido';
                            var descricao = livro.description ? livro.description : 'Descrição indisponível';
                            var paginaInfo = livro.infoLink ? `<a href="${livro.infoLink}" target="_blank">Mais informações</a>` : 'Informações detalhadas indisponíveis';
                            
                            var livroElement = document.createElement('div');
                            livroElement.innerHTML = `
                                <div class="livro">
                                    <img src="${imagem}" alt="Capa do livro">
                                    <h2>${livro.title}</h2>
                                    <p><strong>Autor(es):</strong> ${autores}</p>
                                    <p><strong>Descrição:</strong> ${descricao}</p>
                                    <p>${paginaInfo}</p>
                                    
                                </div>
                            `;
                            livrosDiv.appendChild(livroElement);
                        });
                    } else {
                        livrosDiv.innerHTML = 'Nenhum livro encontrado para o termo de pesquisa fornecido.';
                    }
                })
                .catch(error => {
                    console.error('Ocorreu um erro ao carregar os livros:', error);
                });
        }
    </script>
</body>
</html>