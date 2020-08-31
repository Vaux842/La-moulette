<?php
include "database.php";
global $db;
?>


<!DOCTYPE html>


<html>
	<head>
		<title>La moulette - menu</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<header>
			<div><img src="img/logo_lamoulette.png"><h1>La Moulette</h1></div>
			<nav>
				<ul>
					<li><a href="index.php">Acceuil</a></li>
					<li><a href="#">Menu</a>
						<ul>
							<li><a href="#entree">Entrée</a></li>
							<li><a href="#plat">Plat</a></li>
							<li><a href="#plat_enfant">Plat enfant</a></li>
							<li><a href="#fromage">Fromage</a></li>
							<li><a href="#dessert">Desert</a></li>
							<li><a href="#boisson">Boisson</a></li>
						</ul>
					</li>
					<li><a href="">notre restaurant</a></li>
					<li><a href="">horaires</a></li>
					<li><a href="">contact</a></li>
				</ul>
			</nav>
		</header>
		<div id="entree" class="recipe_list">
			<h2>Entrée</h2>
			<ul>
				<?php
				$m = getRecipes("entrée");
				while($entree = $m->fetch()) { ?>
				<li>
					<img src="<?= $entree["image"]; ?>">
					<h3><?= $entree["name"] ?> - <?= $entree["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="plat" class="recipe_list">
			<h2>Plat</h2>
			<ul>
				<?php
				$m = getRecipes("plat");
				while($plat = $m->fetch()) { ?>
				<li>
					<img src="<?= $plat["image"]; ?>">
					<h3><?= $plat["name"]; ?> - <?= $plat["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="plat_enfant" class="recipe_list">
			<h2>Plat Enfant</h2>
			<ul>
				<?php
				$m = getRecipes("plat_enfant");
				while($enfant = $m->fetch()) { ?>
				<li>
					<img src="<?= $enfant["image"]; ?>">
					<h3><?= $enfant["name"]; ?> - <?= $enfant["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="fromage" class="recipe_list">
			<h2>Fromage</h2>
			<ul>
				<?php
				$m = getRecipes("fromage");
				while($fromage = $m->fetch()) { ?>
				<li>
					<img src="<?= $fromage["image"]; ?>">
					<h3><?= $fromage["name"]; ?> - <?= $fromage["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="dessert" class="recipe_list">
			<h2>Dessert</h2>
			<ul>
				<?php
				$m = getRecipes("dessert");
				while($dessert = $m->fetch()) { ?>
				<li>
					<img src="<?= $dessert["image"]; ?>">
					<h3><?= $dessert["name"]; ?> - <?= $dessert["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="boisson" class="drink_list">
			<h2>Boisson</h2>
			<h3>Bière</h3>
			<ul>
				<?php
				$m = getDrinks("B");
				while($biere = $m->fetch()) { ?>
				<li>
					<img src="<?= $biere["image"]; ?>">
					<h3><?= $biere["name"]; ?> - <?= $biere["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Bière sans alcool</h3>
			<ul>
				<?php
				$m = getDrinks("BSA");
				while($biere_sans_alcool = $m->fetch()) { ?>
				<li>
					<img src="<?= $biere_sans_alcool["image"]; ?>">
					<h3><?= $biere_sans_alcool["name"]; ?> - <?= $biere_sans_alcool["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Vin blanc</h3>
			<ul>
				<?php
				$m = getDrinks("VB");
				while($vin_blanc = $m->fetch()) { ?>
				<li>
					<img src="<?= $vin_blanc["image"]; ?>">
					<h3><?= $vin_blanc["name"]; ?> - <?= $vin_blanc["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Vin rosé</h3>
			<ul>
				<?php
				$m = getDrinks("VRos");
				while($vin_rose = $m->fetch()) { ?>
				<li>
					<img src="<?= $vin_rose["image"]; ?>">
					<h3><?= $vin_rose["name"]; ?> - <?= $vin_rose["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Vin rouge</h3>
			<ul>
				<?php
				$m = getDrinks("VRou");
				while($vin_rouge = $m->fetch()) { ?>
				<li>
					<img src="<?= $vin_rouge["image"]; ?>">
					<h3><?= $vin_rouge["name"]; ?> - <?= $vin_rouge["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Vin pichet</h3>
			<ul>
				<?php
				$m = getDrinks("VP");
				while($vin_pichet = $m->fetch()) { ?>
				<li>
					<img src="<?= $vin_pichet["image"]; ?>">
					<h3><?= $vin_pichet["name"]; ?> - <?= $vin_pichet["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Cidre</h3>
			<ul>
				<?php
				$m = getDrinks("Ci");
				while($cidre = $m->fetch()) { ?>
				<li>
					<img src="<?= $cidre["image"]; ?>">
					<h3><?= $cidre["name"]; ?> - <?= $cidre["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Champagne</h3>
			<ul>
				<?php
				$m = getDrinks("Ch");
				while($champagne = $m->fetch()) { ?>
				<li>
					<img src="<?= $champagne["image"]; ?>">
					<h3><?= $champagne["name"]; ?> - <?= $champagne["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Autre alcool</h3>
			<ul>
				<?php
				$m = getDrinks("AA");
				while($autre_alcool = $m->fetch()) { ?>
				<li>
					<img src="<?= $autre_alcool["image"]; ?>">
					<h3><?= $autre_alcool["name"]; ?> - <?= $autre_alcool["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
			<h3>Soda et autre boisson sans alcool</h3>
			<ul>
				<?php
				$m = getDrinks("SEBSA");
				while($sebsa = $m->fetch()) { ?>
				<li>
					<img src="<?= $sebsa["image"]; ?>">
					<h3><?= $sebsa["name"]; ?> - <?= $sebsa["price"] ?>€</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<footer>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300" >
				<path fill="#00ffff" fill-opacity="1" d="M0,128L34.3,138.7C68.6,149,137,171,206,160C274.3,149,343,107,411,112C480,117,549,171,617,160C685.7,149,754,75,823,69.3C891.4,64,960,128,1029,133.3C1097.1,139,1166,85,1234,64C1302.9,43,1371,53,1406,58.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg></footer>
	</body>
</html>