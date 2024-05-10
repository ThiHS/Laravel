<?php
include('Bd.inc.php');

if(isset($_POST['titulo'])) {
    $bd = new BD();
    $bd->cadastro($_POST);
    $_POST = [];
    Header('Location: '.$_SERVER['PHP_SELF']."?cad=1");
} else {
    if(isset($_GET['cad'])) {
        ?>
            <div class="alert alert-success text-center" role="alert">
                Jogo cadastrado 
            </div>
        <?php
    }
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
                <div class="h1 mt-4">Cadastrar Jogo</div>

                <form class="row mt-5 container text-start m-auto" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <div class="col-12 row my-3">
                        <label class="col-2" for="titulo">Titulo:</label>
                        <div class="col">
                            <input class="w-100" type="text" required name="titulo">
                        </div>
                    </div>

                    <div class="col-12 row my-3">
                        <div class="col-6 row">
                            <label class="col-4" for="preco">Preço:</label>
                            <div class="col">
                                <input class="w-100 ms-2" type="text" required name="preco">
                            </div>
                        </div>

                        <div class="col-6 row">
                            <span class="col-4">
                                Plataforma:
                            </span>

                            <select class="col ms-3" name="plataforma">
                                <option value="PC">COMPUTADOR</option>  
                                <option value="MO">MOBILE</option>  
                                <option value="CO">CONSOLE</option>                             
                            </select>
                        </div>
                        
                    </div>

                    <div class="text-center col-4 mt-2">
                        <button type="submit" class="w-50 btn btn-success">Cadastrar</button>
                    </div>

                    <div class="text-center col-4 mt-2">
                        <button type="reset" class="w-50 btn btn-warning">Apagar registros</button>
                    </div>

                    <div class="text-center col-4 mt-2">
                        <a href="index.php" class="w-50 btn btn-primary">Voltar</a>
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