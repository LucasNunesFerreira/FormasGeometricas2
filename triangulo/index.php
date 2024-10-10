<?php  
require_once("../classes/Triangulo.class.php");
require_once("triangulo.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Triângulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <a href="../unidademedida/index.php" class="btn btn-secondary me-2">Unidade de Medida</a>
            <a href="../circulo/index.php" class="btn btn-secondary me-2">Círculo</a>
            <a href="../quadrado/index.php" class="btn btn-secondary me-2">Quadrado</a>
            <a href="../index.php" class="btn btn-secondary">Menu</a>
        </div>

        <h1 class="mb-4">CRUD de Triângulos</h1>
        <h3 class="text-primary"><?= isset($msg) ? $msg : ''; ?></h3>
        
        <form action="triangulo.php" method="post" enctype="multipart/form-data" class="mb-5">
            <fieldset class="border p-4 mb-4">
                <legend class="w-auto">Dados do Triângulo</legend>
                
                <div class="mb-3">
                    <label for="id" class="form-label">Id:</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?= isset($triangulo) ? $triangulo->getId() : 0; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="lado1" class="form-label">Lado 1:</label>
                    <input type="text" name="lado1" id="lado1" class="form-control" value="<?= isset($triangulo) ? $triangulo->getLado1() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="lado2" class="form-label">Lado 2:</label>
                    <input type="text" name="lado2" id="lado2" class="form-control" value="<?= isset($triangulo) ? $triangulo->getLado2() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="lado3" class="form-label">Lado 3:</label>
                    <input type="text" name="lado3" id="lado3" class="form-control" value="<?= isset($triangulo) ? $triangulo->getLado3() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="cor" class="form-label">Cor:</label>
                    <input type="color" name="cor" id="cor" class="form-control form-control-color" value="<?= isset($triangulo) ? $triangulo->getCor() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="un" class="form-label">Unidade de Medida:</label>
                    <select name="un" id="un" class="form-select" required>
                        <option value="">Selecione</option>
                        <?php  
                            $uns = UnidadeMedida::listar();
                            foreach($uns as $un){ 
                                $str = "<option value='{$un->getId()}' ";
                                if(isset($triangulo) && $triangulo->getUn()->getId() == $un->getId()) 
                                    $str .= " selected ";
                                $str .= ">{$un->getUn()}</option>";
                                echo $str;
                            }     
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fundo" class="form-label">Imagem de Fundo:</label>
                    <input type="file" name="fundo" id="fundo" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar</button>
                    <button type="submit" name="acao" value="Excluir" class="btn btn-danger">Excluir</button>
                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                </div>
            </fieldset>
        </form>

        <form action="" method="get" class="mb-5">
            <fieldset class="border p-4">
                <legend class="w-auto">Pesquisa</legend>
                <div class="mb-3">
                    <label for="busca" class="form-label">Busca:</label>
                    <input type="text" name="busca" id="busca" class="form-control" value="<?= htmlspecialchars($busca) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="0">Escolha</option>
                        <option value="1">Id</option>
                        <option value="2">Lado A</option>
                        <option value="3">Lado B</option>
                        <option value="4">Lado C</option>
                        <option value="5">Cor</option>
                        <option value="6">Tipo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </fieldset>
        </form>

        <hr>

        <h1>Lista de Triângulos</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Lado A</th>
                        <th>Lado B</th>
                        <th>Lado C</th>
                        <th>Cor</th>
                        <th>Tipo</th>
                        <th>Un</th>
                        <th>Área</th>
                        <th>Perímetro</th>
                        <th>Triângulo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $triangulo) {
                        echo "<tr>
                                 <td><a href='index.php?id=" . $triangulo->getId() . "' class='text-decoration-none'>" . $triangulo->getId() . "</a></td>
                                 <td>" . $triangulo->getLado1() . "</td>
                                 <td>" . $triangulo->getLado2() . "</td>
                                 <td>" . $triangulo->getLado3() . "</td>
                                 <td>" . $triangulo->getCor() . "</td>
                                 <td>" . $triangulo->getTipo() . "</td>
                                 <td>" . $triangulo->getUn()->getUn() . "</td>
                                 <td>" . $triangulo->calcularArea($triangulo) . " " . $triangulo->getUn()->getUn() . "²</td>
                                 <td>" . $triangulo->calcularPerimetro($triangulo) . " " . $triangulo->getUn()->getUn() . "</td>
                                 <td><a href='index.php?id=" . $triangulo->getId() . "' class='text-decoration-none'>" . $triangulo->desenhar($triangulo) . "</a></td>
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
