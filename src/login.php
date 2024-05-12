<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frescos Lda. | Log-In</title>
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
                <div class="bg-green-500 rounded-md border-white border-2">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="user">Username:</label>
                        <input placeholder="Username" class="w-48 rounded-lg border border-gray-300 bg-green-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100" type="text" id="user" name="user" required><br><br>
                        <label for="pass">Password:</label>
                        <input placeholder="Password" class="w-48 rounded-lg border border-gray-300 bg-green-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100" type="password" id="pass" name="pass" required><br><br>
                        <button type="submit" id="btnLogin" class="mt-4 bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 w-48 cursor-pointer rounded-md text-center">Iniciar Sessão</button>
                    </form>
                    <a href="criar_user.php"><button class="mt-4 bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 w-48 cursor-pointer rounded-md text-center">Criar Utilizador</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require "./connect.php";
        
            if ($conn->connect_error) {
                die('Falha na Conexão: ' . $conn->connect_error);
            }
        
            if (isset($_POST['user']) && isset($_POST['pass'])) {
                $user = $conn->real_escape_string($_POST['user']);
                $pass = $conn->real_escape_string($_POST['pass']);
            
                $sql = "SELECT * FROM utilizadores WHERE user = '$user' AND pass = '$pass'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    echo '<div class="success">Hello World!</div>';
                    exit();
                }else{
                    echo '<div class="success">FAil!</div>';
                    exit();
                }
            }
        }
    ?>

    <script src="sweetalert2.all.min.js"></script>
    <script>
        import Swal from 'sweetalert2' 
        $('#btnLogin').click(function() {
            Swal.fire({
            type: 'success',
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
            confirmButtonText: "ok",
            });
        })
    </script>
</body>
</html>