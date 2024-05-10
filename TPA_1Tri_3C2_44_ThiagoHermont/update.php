<?php
include('Bd.inc.php');
if($_POST) {
    $bd = new BD();
    $bd->upjogo($_POST);
    $_POST = [];
    Header('Location: visualizar.php?alt=1');
} elseif(isset($_GET['exc'])) {
    $bd = new BD();
    $bd->delete("jogos","id=".$_GET['id']);
    Header('Location: visualizar.php?exc=1');
}else {
    
    $bd = new BD();
    $ddjogo= $bd->select("*","jogos","id=".$_GET['id'])[0];

    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <title>cotemig_fit</title>
        </head>
        <body class=" bg-light">
            <div class="text-center">
                <div class="h1 mt-4">Alterar Informações</div>

                <form class="row mt-5 container text-start m-auto" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <div class="col-12 row my-3">
                        <label class="col-2" for="titulo">Titulo:</label>
                        <div class="col">
                            <input class="w-100" type="text" required name="titulo" value="<?=$ddjogo['titulo']?>">
                        </div>
                    </div>

                    <div class="col-12 row my-3">
                    <div class="col-6 row">
                            <label class="col-4" for="preco">Preço:</label>
                            <div class="col">
                                <input class="w-100 ms-2" type="text" required name="preco" value="<?=$ddjogo['preco']?>">
                            </div>
                        </div>

                        <div class="col-6 row">
                            <span class="col-4">
                                Plataforma:
                            </span>

                            <select class="col ms-3" name="plataforma">
                                <option <?php echo ($ddjogo['plataforma'] == "PC")?"selected":"";?> value="PC">COMPUTADOR</option>  
                                <option <?php echo ($ddjogo['plataforma'] == "MO")?"selected":"";?> value="MO">MOBILE</option>  
                                <option <?php echo ($ddjogo['plataforma'] == "CO")?"selected":"";?> value="CO">CONSOLE</option>                             
                            </select>
                        </div>
                        
                    </div>

                    <div class="text-center col-3 mt-2">
                        <button type="submit" class="w-50 btn btn-success">Alterar</button>
                    </div>

                    <div class="text-center col-3 mt-2">
                        <button type="reset" class="w-50 btn btn-warning">Restaurar</button>
                    </div>

                    <div class="text-center col-3 mt-2">
                        <a href="<?=$_SERVER['PHP_SELF']?>?exc=1&id=<?=$_GET['id']?>" class="w-50 btn btn-danger">Deletar Aluno</a>
                    </div>

                    <div class="text-center col-3 mt-2">
                        <a href="visualizar.php" class="w-50 btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
            <script src="main.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>        
        </body>
    </html>
    <?php
}
?>