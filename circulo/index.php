<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    session_start();
    include_once('circulo.php');
    ?>
</head>
<body>
    <div class="container mt-5">
        <div class="">
            <a href="./cadastro.php" class="btn btn-primary">Novo Círculo</a>
            <a href="../unidademedida/index.php" class="btn btn-secondary">Unidade de Medida</a>
            <a href="../quadrado/index.php" class="btn btn-secondary">Quadrado</a>
            <a href="../triangulo/index.php" class="btn btn-secondary">Triangulo</a>
            <a href="../index.php" class="btn btn-secondary">Menu</a>
        </div><br>

        <form method="get" class="mb-4">
            <h4 class="mb-3">Busca</h4>
            <div class="mb-3">
                <input type="text" name="busca" id="busca" class="form-control" placeholder="Busca">
            </div>
            <div class="mb-3">
                <select name="tipo" id="tipo" class="form-select">
                    <option value="1">ID</option>
                    <option value="2">Raio</option>
                    <option value="3">Cor</option>
                    <option value="4">Unidade</option>
                </select>
            </div>
            <button type="submit" name="acao" id="acao" class="btn btn-primary">Buscar</button>
        </form>

        <h2 class="mb-4 text-center">Lista de Círculos</h2>

        <div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Raio</th>
                        <th>Cor</th>
                        <th>Unidade</th>
                        <th>Perímetro</th>
                        <th>Área</th>
                        <th>Círculos</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $circulo) {
                        echo "<tr>
                            <td><a href='index.php?id=" . $circulo->getId() . "' class='text-primary'>" . $circulo->getId() . "</a></td>
                            <td>" . $circulo->getRaio() . "</td>
                            <td>" . $circulo->getCor() . "</td>
                            <td>" . $circulo->getUn()->getUn() . "</td>
                            <td>" . $circulo->calcularPerimetro() . " " . $circulo->getUn()->getUn() . "²</td>
                            <td>" . $circulo->calcularArea() . " " . $circulo->getUn()->getUn() . "³</td>
                            <td><a href='index.php?id=" . $circulo->getId() . "' class='text-primary'>" . $circulo->desenhar($circulo) . "</a></td>
                            <td><a href='cadastro.php?id={$circulo->getId()}' class='text-primary'>Editar</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+2aoCwLgYsY9HDPEeFgVH8BxPqDkV" crossorigin="anonymous"></script>
</body>
</html>
