<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Reas Api</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
		<div class="cont-select-country">
			<form action="RestApi.php" method="POST">
				<select class="select-country" name="country">
				<option value="">Selecciona una opción</option>
				<option value="en">English</option>
				<option value="fr">French</option>
				<option value="de">German</option>
				<option value="pt">Portugal</option>
				<option value="es">Spanish</option>
				<option value="sw">Swahili</option>
				</select>
				<input class="btn" type="submit" value="Mostrar">
			</form>
		</div>
	</div>
	<?php 
	if(isset($_POST['country'])){
		$country = $_POST['country'];
		if($country !== ""){
			if($country === "en"){?>
				<div class="count-idioma">
					<h1 class="idioma">English</h1>
				</div> 
				<hr><?php
			}else if($country === "fr"){?>
				<div class="count-idioma">
					<h1 class="idioma">French</h1>
				</div> 
				<hr><?php
			}else if($country === "de"){?>
				<div class="count-idioma">
					<h1 class="idioma">German</h1>
				</div> 
				<hr><?php
			}else if($country === "pt"){?>
				<div class="count-idioma">
					<h1 class="idioma">Portugal</h1>
				</div> 
				<hr><?php
			}else if($country === "es"){?>
				<div class="count-idioma">
					<h1 class="idioma">Spanish</h1>
				</div> 
				<hr><?php
			}else if($country === "sw"){?>
				<div class="count-idioma">
					<h1 class="idioma">Swahili</h1>
				</div> 
				<hr><?php
			}
			$json = file_get_contents('https://restcountries.eu/rest/v2/lang/'.$country);
			$arreglo = json_decode($json,"false"); ?>
			<div class="count-table">
				<table>
					<tr>
						<th class="item">Bandera</th>
						<th class="item2">País</th>
						<th class="item">Región</th>
						<th class="item4">Latitud y Longitud</th>
					</tr>
				</table><?php
				foreach($arreglo as $post){ ?>
					<table>
						<tr>
							<td class="item"><img class="img-country" src="<?php echo $post['flag']; ?>"></td>
							<td class="item2"><?php echo $post['name']; ?></td>
							<td class="item"><?php echo $post['region']; ?></td>
							<td class="item4"><?php 
								$ArrayLats = $post['latlng']; 
								foreach($ArrayLats as $latlng){
								    echo $latlng . "\n";
								} ?>
							</td>
						</tr>
					</table><?php 
				} ?>
			</div> <?php
		}
	} ?>
</body>
</html>