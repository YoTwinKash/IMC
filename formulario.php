<?php
session_start();

// Verifica se há usuários na sessão
if(isset($_SESSION['users'])) {
    $users = $_SESSION['users'];
} else {
    $users = array();
}
?>

<html>
<head>
    <style>
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
        .nav_bar {
            background-color: #f8659e;
            overflow: hidden;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: pink;
        }
        .container {
            width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8659e;
            color: white;
        }
    </style>
</head>
<body>
<div class="nav_bar">
    <a href="index.php">Inicio</a>
    <a href="ajuda.php">Ajuda com seu IMC</a>
</div>
<div class="container">
    <h2>Dados dos Usuários</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Peso (kg)</th>
            <th>Altura (m)</th>
            <th>IMC</th>
            <th>Classificação</th>
        </tr>
        <?php
        // Exibe os dados em uma tabela
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user["nome"] . '</td>';
            echo '<td>' . $user["peso"] . '</td>';
            echo '<td>' . $user["altura"] . '</td>';
            echo '<td>' . $user["imc"] . '</td>';
            echo '<td>';
            if ($user["imc"] < 18.5) {
                echo "Abaixo do peso";
            } elseif ($user["imc"] < 24.9) {
                echo "Peso normal";
            } elseif ($user["imc"] < 29.9) {
                echo "Sobrepeso";
            } elseif ($user["imc"] < 34.9) {
                echo "Obesidade Grau 1";
            } elseif ($user["imc"] < 39.9) {
                echo "Obesidade Grau 2";
            } else {
                echo "Obesidade Grau 3";
            }
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>