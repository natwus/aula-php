<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            background-image: linear-gradient(216deg, rgba(77, 77, 77, 0.05) 0%, rgba(77, 77, 77, 0.05) 25%, rgba(42, 42, 42, 0.05) 25%, rgba(42, 42, 42, 0.05) 38%, rgba(223, 223, 223, 0.05) 38%, rgba(223, 223, 223, 0.05) 75%, rgba(36, 36, 36, 0.05) 75%, rgba(36, 36, 36, 0.05) 100%), linear-gradient(44deg, rgba(128, 128, 128, 0.05) 0%, rgba(128, 128, 128, 0.05) 34%, rgba(212, 212, 212, 0.05) 34%, rgba(212, 212, 212, 0.05) 57%, rgba(25, 25, 25, 0.05) 57%, rgba(25, 25, 25, 0.05) 89%, rgba(135, 135, 135, 0.05) 89%, rgba(135, 135, 135, 0.05) 100%), linear-gradient(241deg, rgba(55, 55, 55, 0.05) 0%, rgba(55, 55, 55, 0.05) 14%, rgba(209, 209, 209, 0.05) 14%, rgba(209, 209, 209, 0.05) 60%, rgba(245, 245, 245, 0.05) 60%, rgba(245, 245, 245, 0.05) 69%, rgba(164, 164, 164, 0.05) 69%, rgba(164, 164, 164, 0.05) 100%), linear-gradient(249deg, rgba(248, 248, 248, 0.05) 0%, rgba(248, 248, 248, 0.05) 32%, rgba(148, 148, 148, 0.05) 32%, rgba(148, 148, 148, 0.05) 35%, rgba(202, 202, 202, 0.05) 35%, rgba(202, 202, 202, 0.05) 51%, rgba(181, 181, 181, 0.05) 51%, rgba(181, 181, 181, 0.05) 100%), linear-gradient(92deg, hsl(214, 0%, 11%), hsl(214, 0%, 11%));
            display: flex;
            justify-content: center;
            padding-top: 130px;
            padding-bottom: 462px;
            gap: 30px;
        }

        section {
            background-image: radial-gradient(circle at center center, transparent 0%, rgb(0, 0, 0) 85%), linear-gradient(78deg, rgba(192, 192, 192, 0.05) 0%, rgba(192, 192, 192, 0.05) 50%, rgba(60, 60, 60, 0.05) 50%, rgba(60, 60, 60, 0.05) 100%), linear-gradient(227deg, rgba(97, 97, 97, 0.05) 0%, rgba(97, 97, 97, 0.05) 50%, rgba(52, 52, 52, 0.05) 50%, rgba(52, 52, 52, 0.05) 100%), linear-gradient(240deg, rgba(98, 98, 98, 0.05) 0%, rgba(98, 98, 98, 0.05) 50%, rgba(249, 249, 249, 0.05) 50%, rgba(249, 249, 249, 0.05) 100%), linear-gradient(187deg, rgba(1, 1, 1, 0.05) 0%, rgba(1, 1, 1, 0.05) 50%, rgba(202, 202, 202, 0.05) 50%, rgba(202, 202, 202, 0.05) 100%), linear-gradient(101deg, rgba(61, 61, 61, 0.05) 0%, rgba(61, 61, 61, 0.05) 50%, rgba(254, 254, 254, 0.05) 50%, rgba(254, 254, 254, 0.05) 100%), linear-gradient(176deg, rgba(237, 237, 237, 0.05) 0%, rgba(237, 237, 237, 0.05) 50%, rgba(147, 147, 147, 0.05) 50%, rgba(147, 147, 147, 0.05) 100%), linear-gradient(304deg, rgba(183, 183, 183, 0.05) 0%, rgba(183, 183, 183, 0.05) 50%, rgba(57, 57, 57, 0.05) 50%, rgba(57, 57, 57, 0.05) 100%), radial-gradient(circle at center center, hsl(351, 4%, 12%), hsl(351, 4%, 12%));
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 85px;
            border-radius: 0.7em;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        /* botão criar */
        .create {
            border: 2px solid #fd0000;
            background-color: #fd0000;
            border-radius: 0.9em;
            padding: 0.8em 1.2em 0.8em 1em;
            transition: all ease-in-out 0.2s;
            font-size: 16px;
            cursor: pointer;
            transition: ease-in-out 0.3s
        }

        .create span {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 600;
        }

        .create:hover {
            background-color: #850000;
            transform: scale(125%);
            transition: ease-in-out 0.3s
        }

        /* botao consultar */
        .consult {
            border: 2px solid #fd0000;
            background-color: #fd0000;
            border-radius: 0.9em;
            padding: 0.8em 1.2em 0.8em 1em;
            transition: all ease-in-out 0.2s;
            font-size: 16px;
            cursor: pointer;
            transition: ease-in-out 0.3s
        }

        .consult span {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 600;
        }

        .consult:hover {
            background-color: #850000;
            transform: scale(125%);
            transition: ease-in-out 0.3s;
        }
    </style>
</head>

<body>
    <section>
        <div>
            <h1>VEÍCULOS</h1>
        </div>
        <div class="buttons">
            <form method="post" action="cadastroVeiculo.php">
                <button class="create">
                    <span>Incluir</span>
                </button>
            </form>
            <form method="post" action="veiculos.php">
                <button class="consult">
                    <span>Consultar</span>
                </button>
            </form>
        </div>
    </section>
    <section>
        <div>
            <h1>CORES</h1>
        </div>
        <div class="buttons">
            <form method="post" action="cadastroCor.php">
                <button class="create">
                    <span>Incluir</span>
                </button>
            </form>
            <form method="post" action="cores.php">
                <button class="consult">
                    <span>Consultar</span>
                </button>
            </form>
        </div>
    </section>
</body>
</html>