<?php

session_start();
$nome = "";
$peso = "";
$altura = "";
$imc = "";
// Verifica se os dados foram enviados via POST e processa-os
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    // Calcula o IMC
    $imc = $peso / ($altura * $altura);
    $imc = round($imc, 1);

    // Adiciona os dados do usuário à sessão
    $_SESSION['users'][] = array("nome" => $nome, "peso" => $peso, "altura" => $altura, "imc" => $imc);
}

        
  
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: pink;
        }
        .container {
            width: 400px;
            margin: 300px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #f8659e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {   
            line-height: 37px; 
            text-align: center;
        }
        .nav_bar {
            background-color: #f8659e;
            overflow: hidden;
        }
        
        .nav_bar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        .nav_bar a:hover {
            background-color: #ffe7ee;
            color: black;
        }
       
    </style>
</head>
<body>

<div class="nav_bar">

    <a href="formulario.php">Formulário</a>
    <a href="ajuda.php">Ajuda com seu IMC</a>
</div>

<div class="container">
    <h2>Calculo de IMC</h2>
    <form method="post" action="index.php">
        <label for="name">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="weight">Peso (kg):</label>
        <input type="number" name="peso" id="peso" required><br>
        <label for="height">Altura (m):</label>
        <input type="number" name="altura" id="altura" step="0.01" required><br>
        <input type="submit" value="Calcular">

       
        
    </form>
    <?php if ($nome != "" && $peso != "" && $altura != ""): ?>
            <div class="result">
                Seu IMC é: <?php echo $imc; ?><br>
                Classificação: 
                <?php
                if ($imc < 18.5) {
                    echo "Abaixo do peso";
                } elseif ($imc < 24.9) {
                    echo "Peso normal";
                } elseif ($imc < 29.9) {
                    echo "Sobrepeso";
                } elseif ($imc < 34.9) {
                    echo "Obesidade Grau 1";
                } elseif ($imc < 39.9) {
                    echo "Obesidade Grau 2";
                } else {
                    echo "Obesidade Grau 3";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>