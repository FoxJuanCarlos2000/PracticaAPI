<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CONSUMO DE API</title>
	
</head>
<body>
	<center>
	<center>
	<div class="container">
			<form action="index.php" method="POST">
				<select name="country">
				<option value="">Selecciona una opción</option>
				<option value="en">English</option>
				<option value="fr">French</option>
				<option value="de">German</option>
				<option value="pt">Portugal</option>
				<option value="es">Spanish</option>
				<option value="sw">Swahili</option>
				</select>
				<input type="submit" value="Buscar">
			</form>
	</div>
	</center>
	<?php 
	if(isset($_POST['country'])){
		$country = $_POST['country'];
		if($country !== ""){
			if($country === "en"){?>
					<center><h1>Has seleccionado: English</h1></center>
				<?php
			}else if($country === "fr"){?>
					<center><h1>Has seleccionado:  French</h1></center>
				<?php
			}else if($country === "de"){?>
					<center><h1>Has seleccionado:  German</h1></center>
				<?php
			}else if($country === "pt"){?>
					<center><h1>Has seleccionado:  Portugal</h1></center>
				<?php
			}else if($country === "es"){?>
					<center><h1>Has seleccionado:  Spanish</h1></center>
				<?php
			}else if($country === "sw"){?>
					<center><h1>Has seleccionado:  Swahili</h1></center>
				<?php
			}
			$json = file_get_contents('https://restcountries.eu/rest/v2/lang/'.$country);
			$array = json_decode($json,"false"); ?>
			
				<center>
					<table border="1">
					<tr>
						<th>Bandera</th>
						<th>País</th>
						<th>Región</th>
						<th>Latitud y Longitud</th>
					</tr>
				<?php foreach($array as $mostrar){ ?>
					<tr>
						<td><img style="width: 100px; height: 50px;"; src="<?php echo $mostrar['flag']; ?>"></td>
						<td><?php echo $mostrar['name']; ?></td>
						<td><?php echo $mostrar['region']; ?></td>
						<td><?php $array2 = $mostrar['latlng']; 
							foreach($array2 as $latlng){
								 echo $latlng;
								} ?></td>
					</tr>
					</table>
					<br>
				</center>
					<?php 
					} 
				?>
			 <?php
		}
	} ?>
	</center>
</body>
</html>