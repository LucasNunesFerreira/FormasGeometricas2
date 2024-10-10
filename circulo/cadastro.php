<!DOCTYPE html>
<html lang="pt-br">
<?php
    include_once('circulo.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Criação de Formas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <a href="../index.php" class="btn btn-secondary mb-4">Menu</a>

        <form action="circulo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $id ? $circulo->getId() : 0 ?>" readonly>

            <div class="mb-3">
                <label for="raio" class="form-label">Raio</label>
                <input type="number" name="raio" id="raio" class="form-control" value="<?= $id ? $circulo->getRaio() : 0 ?>" placeholder="Raio do seu círculo">
            </div>

            <div class="mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="color" name="cor" id="cor" class="form-control form-control-color" value="<?= $id ? $circulo->getCor() : 'black' ?>">
            </div>

            <div class="mb-3">
                <label for="un" class="form-label">Unidade</label>
                <select name="un" id="un" class="form-select">
                    <?php  
                        $uns = UnidadeMedida::listar();
                        foreach($uns as $un){ 
                            $str = "<option value='{$un->getId()}' ";
                            if(isset($forma) && $forma->getUn()->getId() == $un->getId()) 
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

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" name="acao" value="Salvar" class="btn btn-primary">Salvar</button>
                <button type="submit" name="acao" value="Excluir" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+2aoCwLgYsY9HDPEeFgVH8BxPqDkV" crossorigin="anonymous"></script>
</body>
</html>
