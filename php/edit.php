<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Tires</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="tires.php">Все шины</a></li>
                    <li><a href="diameters.php">Диаметры</a></li>
                    <li><a href="countries.php">Страны</a></li>
                </ul>
            </div>
        </div>
        </nav>
        </header>
        <div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>
            <?php
                    $id = $_GET['tare_id'];
                    if($id) {
                        $tire = getTireById($db, $id);
                    }
                    else {
                        echo '<div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  Слот не найден
                                </div>';
                    }
             ?>
            <form action="save.php" method="post">
                <input type="hidden" name="id" value="<?php echo $tire['tare_id']; ?>">
                <div class="form-group">
                    <label for="name">Название шины</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $tire['tire_name']; ?>">
                  </div>
                  <button type="submit" class="btn btn-default">Сохранить</button>
            </form>
        </div>
        <footer>
        </footer>
    </body>