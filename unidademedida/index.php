<?php  
include_once('unidademedida.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Unidade de Medida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Unidade de Medida</h1>
        
        <form action="unidademedida.php" method="post" class="mb-4">
            <div class="mb-3">
                <label for="id" class="form-label">Id:</label>
                <input type="text" name="id" id="id" class="form-control" readonly value="<?= isset($unidade) ? $unidade->getId() : 0 ?>">
            </div>

            <div class="mb-3">
                <label for="un" class="form-label">Un:</label>
                <input type="text" name="un" id="un" class="form-control" value="<?= isset($unidade) ? $unidade->getUn() : '' ?>">
            </div>
            <div>
                <button type="submit" name="acao" value="salvar" class="btn btn-primary">Salvar</button>
                <button type="submit" name="acao" value="Excluir" class="btn btn-danger">Excluir</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
            </div>
        </form>

        <form action="" method="get" class="mb-4">
            <fieldset class="border p-3">
                <legend class="w-auto">Pesquisa</legend>
                
                <div class="mb-3">
                    <label for="busca" class="form-label">Busca:</label>
                    <input type="text" name="busca" id="busca" class="form-control" value="">
                </div>
                
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="">Escolha</option>
                        <option value="1">Id</option>
                        <option value="2">Un</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Buscar</button>
            </fieldset>
        </form>

        <hr>

        <h2 class="text-center mb-4">Lista de Unidades de Medida</h2>
        <a href="../index.php" class="btn btn-secondary mb-4">Menu</a>
        
        <div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Un</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    foreach($lista as $unidade) { 
                        echo "<tr>
                                <td><a href='index.php?id=".$unidade->getId()."' class='text-primary'>".$unidade->getId()."</a></td>
                                <td>{$unidade->getUn()}</td>
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
