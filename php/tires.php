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
                    $tires = getAllTires($db);
             ?>
             <table class="table table-bordered">
                 <tr>
                     <th>Шина</th>
                     <th>Диаметр</th>
                     <th>Страна</th>
                     <th>Удалить</th>
                 </tr>
                 <?php foreach ($tires as $tire) { ?>
                    <tr>
                    <td><a href="edit.php?tare_id=<?php echo $tire['tare_id'];?>"><?php echo $tire['tire_name']; ?></a></td>
                        <td><?php echo $tire['diameter']; ?></td>
                        <td><?php echo $tire['country_name']; ?></td>
                        <td><a class="btn btn-danger" href="delete.php?tare_id=<?php echo $tire['tare_id'];?>">Удалить</a></td>
                    </tr>
                <?php } ?>
             </table>
             <button id="addButton" class="btn btn-default">Добавить шину</button>
			    <form action="" method="POST" role="form" style="display: none; margin-top: 20px;">
		
			        <div class="form-group">
				        <label for="">Введите название</label>
				        <input type="text" class="form-control" id="name" name="tire_name" placeholder="Введите название">
			        </div>
			        <div class="form-group">
				        <select name="country" class="form-control" id="country">
				            <?php
					            $countries = getCountries($db);
					            foreach ($countries as $key => $value) {
						            echo "<option value=".$value['country_id'].">".$value['country_name']."</option>";	
					            }	
				            ?>
				        </select>
                        <select name="diameter" class="form-control" id="diameter">
				            <?php
					            $diameters = getDiameters($db);
					            foreach ($diameters as $key => $value) {
						            echo "<option value=".$value['diameter_id'].">".$value['diameter']."</option>";	
					            }	
				            ?>
				        </select>
			        </div>
			
			<button type="submit" class="btn btn-default">Добавить</button>
		</form>
		</div>
		<?php
			if(isset($_POST['tire_name']) && $_POST['tire_name'] != '') {
				$tire_name = $_POST['tire_name'];
				$country_id = $_POST['country'];
                $diameter_id = $_POST['diameter'];
				addTire($db, $tire_name, $country_id, $diameter_id);
			}
			
		?>
	</div>
	<footer>
		
	</footer>
	<script>
		$("#addButton").click(function(){
			$("form").slideDown();
		});
	</script>
</body>
</html>