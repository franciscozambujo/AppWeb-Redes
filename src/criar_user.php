<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frescos Lda. | Criar Utilizador</title>
    <link href="output.css" rel="stylesheet">
    <link href="number.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../imagens/fruits.png">
</head>
<body class="bg-green-300">
    <header class="bg-green-500 text-white h-48">
        <img src="../imagens/frescos.png" alt="Logo" class="w-28 m-auto">
        <nav class="flex justify-center m-4">
            <img src="../imagens/store.svg" alt="icon">
            <a href="index.html" class="px-2 hover:border hover:border-green-600 hover:rounded-md">Início</a>
            •
            <a href="contactos.html" class="px-2 hover:border hover:border-green-600 hover:rounded-md">Contactos</a>
            •
            <a href="produtos/produtos.php" class="px-2 hover:border hover:border-green-600 hover:rounded-md">Produtos</a>
            •
            <a href="produtores/produtores.php" class="px-2 hover:border hover:border-green-600 hover:rounded-md">Produtores</a>
            •
            <a href="login.php" class="px-2 hover:border hover:border-green-600 hover:rounded-md">Log-In</a>
            <img src="../imagens/store.svg" alt="icon">
        </nav>
        <div class="flex absolute left-0 w-full z-10">
            <img src="../imagens/toldo.png" alt="Toldo" class="m-auto w-2/4">
        </div>
    </header>
    <div class="flex justify-center mt-24 mb-10">
        <div class="w-80 rounded-2xl bg-white">
            <div class="flex flex-col justify-center text-center gap-y-3">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-green-500 rounded-md border-white border-2">
                    <label for="user">Insira o seu username:</label>
                    <input placeholder="Novo Username" class="w-24 rounded-lg border border-gray-300 bg-green-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100" type="text" id="user" name="user" required><br><br>
                    <label for="pass">Insira a sua password:</label>
                    <input placeholder="Nova Password" class="w-24 rounded-lg border border-gray-300 bg-green-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100" type="password" id="pass" name="pass" required><br><br>
                    <button type="submit" class="mt-4 bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 w-48 cursor-pointer rounded-md text-center">Criar Utilizador</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        require "./connect.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $conn->real_escape_string($_POST['user']);
        $pass = $conn->real_escape_string($_POST['pass']);

        $sql_check = "SELECT * FROM utilizadores WHERE user = '$user' AND pass = '$pass'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {  
            echo "Utilizador e password já existem!";
        } else {
            $sql_insert = "INSERT INTO utilizadores (user, pass) VALUES ('$user', '$pass')";

            if ($conn->query($sql_insert) === TRUE) {
            echo "Utilizador criado com sucesso!";
            } else {
            echo "Erro ao criar utilizador: " . $conn->error;
            }
        }
        $conn->close();
        }
    ?>
</body>
</html>