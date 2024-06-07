<style>
    body {
        display: flex;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        flex-direction: column;
        background: #0e2430;
        background: linear-gradient(135deg, #121212 25%, #1a1a1a 25%, #1a1a1a 50%, #121212 50%, #121212 75%, #1a1a1a 75%, #1a1a1a);
        background-size: 40px 40px;
        animation: move 4s linear infinite;
    }

    @keyframes move {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 40px 40px;
        }
    }

    .card {
        position: relative;
        width: 480px;
        height: 700px;
        border-radius: 14px;
        z-index: 1111;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 5px 5px 15px #fc3a51, -5px -5px 15px #fc3a51;
        padding: 20px;
    }

    .bg {
        position: absolute;
        top: 5px;
        left: 5px;
        width: 470px;
        height: 690px;
        z-index: 2;
        background: #fc3a51;
        border-radius: 10px;
        overflow: hidden;
        outline: 2px solid white;
        padding: 20px;
    }

    .blob {
        position: absolute;
        z-index: 1;
        top: 50%;
        left: 50%;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #e8d5b7;
        opacity: 1;
        filter: blur(12px);
        animation: blob-bounce 5s infinite ease-in-out;
        padding: 190px;
    }

    @keyframes blob-bounce {
        0% {
            transform: translate(-100%, -100%) translate3d(0, 0, 0);
        }

        25% {
            transform: translate(-100%, -100%) translate3d(100%, 0, 0);
        }

        50% {
            transform: translate(-100%, -100%) translate3d(100%, 100%, 0);
        }

        75% {
            transform: translate(-100%, -100%) translate3d(0, 100%, 0);
        }

        100% {
            transform: translate(-100%, -100%) translate3d(0, 0, 0);
        }
    }

    .voltar {
        padding: 8px;
        border-radius: 8px;
        border: none;
        background-color: #e8d5b7;
        cursor: pointer;
        transition: 0.3s ease;
        margin-top: 15px;
        width: 120px;
    }

    .voltar:hover {
        transform: scale(120%);
        transition: 0.3s ease;
    }

    table {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -60%);
        border-radius: 18px;
        background-color: #e8d5b7;
        padding: 10px;
        text-align: center;
    }

    th {
        padding: 10px;
    }

    .excluir {
        margin-top: 20px;
        width: 75px;
        height: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        background: red;
        border: none;
        border-radius: 5px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
        background: #fc3a51;
        transition: 0.2s ease-in-out;
    }

    .excluir,
    .excluir span {
        transition: 200ms;
    }

    .excluir .text {
        transform: translateX(1px);
        color: white;
        font-weight: bold;
    }

    .excluir .icon {
        position: absolute;
        transform: translateX(50px);
        height: 10px;
        width: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .excluir svg {
        width: 15px;
        fill: #eee;
        transition: 0.1s ease-in-out;
    }

    .excluir:hover {
        background: #ff3636;
    }

    .excluir:hover .text {
        color: transparent;
    }

    .excluir:hover .icon {
        width: 150px;
        border-left: none;
        transform: translateX(-28%);
        transition: 0.2s ease-in-out;
    }

    .excluir:focus {
        outline: none;
    }

    .excluir:active .icon svg {
        transform: scale(0.8);
        transition: 0.2s ease-in-out;
    }
</style>

<body>
    <div class="card">
        <div class="bg">
            <table border="1">

                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Excluir</th>
                </thead>

                <?php
                $servername = "localhost";
                $database = "pessoas";
                $username = "root";
                $password = "";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die ("falha na conexão" . mysqli_connect_error());
                }

                $sql = "SELECT * FROM dados_pessoais";

                $resultado = mysqli_query($conn, $sql) or die ("erro");

                while ($row = mysqli_fetch_array($resultado)) {
                    $pessoa_id = $row["pessoa_id"];
                    $pessoa_nome = $row["pessoa_nome"];
                    $pessoa_cidade = $row["pessoa_cidade"];
                    $pessoa_estado = $row["pessoa_estado"];
                    $pessoa_nascimento = $row["pessoa_nascimento"];

                    echo "<tr>";
                    echo "<td>" . $pessoa_id . "</td>";
                    echo "<td>" . $pessoa_nome . "</td>";
                    echo "<td>" . $pessoa_nascimento . "</td>";
                    echo "<td>" . $pessoa_estado . "</td>";
                    echo "<td>" . $pessoa_cidade . "</td>";


                    echo "<td>
                            <form method='post' action='deletaCadastro.php'>
                                <input hidden type='number' value='$pessoa_id' name='pessoa_id'>
                                <button class='excluir'>
                                    <span class='text'>Excluir</span>
                                    <span class='icon'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                                            <path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'></path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                            <form method='post' action='alterarCadastro.php'>
                                <input hidden type='number' value='$pessoa_id' name='pessoa_id'>
                                <input hidden type='text' value='$pessoa_nome' name='pessoa_nome'>
                                <input hidden type='date' value='$pessoa_nascimento' name='pessoa_nascimento'>
                                <input hidden type='text' value='$pessoa_estado' name='pessoa_estado'>
                                <input hidden type='text' value='$pessoa_cidade' name='pessoa_cidade'>
                                <input type='submit' value='Alterar'>
                            </form>
                        </td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
                ?>
            </table>
            <form action="cadastrar.php" method="post" style="position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%,-90%);">
                <button class="voltar">Voltar</button>
            </form>
        </div>
        <div class="blob"></div>
    </div>
</body>