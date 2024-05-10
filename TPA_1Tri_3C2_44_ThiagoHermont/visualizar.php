<?php
if(isset($_GET['alt'])) {
    ?>
        <div class="alert alert-success text-center" role="alert">
            Jogo alterado 
        </div>
    <?php
} elseif(isset($_GET['exc'])) {
    ?>
        <div class="alert alert-warning text-center" role="alert">
            Jogo excluido
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
        <div class="text-center m-0"> 
            <div class="h1 my-5"> Visualização dos Alunos</div>
            <div class="row m-0">
                <?php
                include('Bd.inc.php');
                $bd = new BD();
                foreach ($bd->select("*","jogos") as $value) {
                    ?>
                        <a class="col-4 text-center" href="update.php?id=<?=$value['id']?>">
                            <div class="w-75 btn btn-warning my-4">
                                <div class="h2"><?=$value['titulo']?> </div><br>
                                <div class="row">
                                    <div class="h5 col-7">Plataforma: <?= strtoupper($value['plataforma'])?> </div> 
                                    <div class="h5 col-5">Preço: R$<?= strtoupper($value['preco'])?></div>
                                </div>
                            </div>
                        </a>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="text-center mt-2">
            <a href="index.php" class="w-25 btn btn-primary mt-4">Voltar</a>
        </div>

        <script src="main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
    </body>
</html>

