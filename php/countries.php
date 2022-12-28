<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
<div id="content">
<div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>
            <?php
                    $countries = getCountries($db);
             ?>
             <table class="table table-bordered">
                 <tr>
                     <th>Страна</th>
                     <th>Название</th>
                 </tr>
                 <?php foreach ($countries as $country) { ?>
                    <tr>
                        <td><?php echo $country['country_name']; ?></td>
                        <td><?php echo $country['tire_name']; ?></td>
                    </tr>
                <?php } ?>
             </table>
             </div>
	</div>
	<footer>	
	</footer>
</body>
</html>