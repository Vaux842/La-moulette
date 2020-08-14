<?php
include "../database.php";
global $db;

$e = $db->query("SELECT * FROM `entrée`");
$p = $db->query("SELECT * FROM `plat`");
$pe = $db->query("SELECT * FROM `plat_enfant`");
$f = $db->query("SELECT * FROM `fromage`");
$d = $db->query("SELECT * FROM `dessert`");
$b_B = $db->query("SELECT * FROM `boisson` where type='B'");
$b_BSA = $db->query("SELECT * FROM `boisson` where type='BSA'");
$b_VB = $db->query("SELECT * FROM `boisson` where type='VB'");
$b_VRos = $db->query("SELECT * FROM `boisson` where type='VRos'");
$b_VRou = $db->query("SELECT * FROM `boisson` where type='VRou'");
$b_VP = $db->query("SELECT * FROM `boisson` where type='Vp'");
$b_Ci = $db->query("SELECT * FROM `boisson` where type='Ci'");
$b_Ch = $db->query("SELECT * FROM `boisson` where type='Ch'");
$b_AA = $db->query("SELECT * FROM `boisson` where type='AA'");
$b_SEBSA = $db->query("SELECT * FROM `boisson` where type='SEBSA'");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>La moulette - admin</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>

		<div id="recipe_pop_up">
			<h2 id="pop-up-title">Ajouter une recette :</h2>
			<form method="POST" action="edit_recipe.php" enctype="multipart/form-data">
				<input type="hidden" id="table_input" name="table_input" >
				<input type="hidden" id="base-name" name="base-name" disabled>
				<input type="hidden" id="base-image" name="base-image" disabled>
				<input type="hidden" id="base-price" name="base-price" disabled>
				<input type="hidden" id="base-type" name="base-type" disabled>
				<h3 id="label-recipe-name">Nom de la recette :</h3>
				<input type="text" id="recipe-name" name="recipe-name" placeholder="nom de la recette" required>
				<h3>Prix :</h3>
				<input type="number" id="recipe-price" name="recipe-price" max="100" min="0" step="0.05" required><span>€</span>
				<div id="drink-type-selecter">
					<h3>Type de boisson :</h3>
					<input type="radio" id="B_radio" name="drink-type" value="B">
					<label for="B_radio">Bière</label><br>
					<input type="radio" id="BSA_radio" name="drink-type" value="BSA">
					<label for="BSA_radio">Bière sans alcool</label><br>
					<input type="radio" id="VB_radio" name="drink-type" value="VB">
					<label for="VB_radio">Vin blanc</label><br>
					<input type="radio" id="VRos_radio" name="drink-type" value="VRos">
					<label for="VRos_radio">Vin rosé</label><br>
					<input type="radio" id="VRou_radio" name="drink-type" value="VRou">
					<label for="VRou_radio">Vin rouge</label><br>
					<input type="radio" id="VP_radio" name="drink-type" value="VP">
					<label for="VP_radio">Vin pichet</label><br>
					<input type="radio" id="Ci_radio" name="drink-type" value="Ci">
					<label for="Ci_radio">Cidre</label><br>
					<input type="radio" id="Ch_radio" name="drink-type" value="Ch">
					<label for="Ch_radio">Champagne</label><br>
					<input type="radio" id="AA_radio" name="drink-type" value="AA">
					<label for="AA_radio">Autre alcool</label><br>
					<input type="radio" id="SEBSA_radio" name="drink-type" value="SEBSA">
					<label for="AEBSA_radio">Soda et autre boisson sans alcool</label><br>
				</div>
				<h3>Image :</h3>
				<img id="image_preview" src="../img/plat.png" alt="image du plat">
				<input type="file" id="file" name="recipe-image" accept="image/png, image/jpeg" hidden required>
				<button type="button" id="browse-file-button">choisir une image</button>
				<div id="add-pop-up-command">
					<button type="button" id="cancel_button" onclick="hide_recipe_pop_up();">Annuler</button>
					<button id="submit_button" name="add" type="submit">Ajouter</button>
					<button id="sup" name="sup" type="submit">Supprimer</button>
				</div>
			</form>
		</div>
		<header>
			<div>
				<img src="../img/logo_lamoulette.png">
				<h1 id="admin_title">administration de la moulette</h1>
			</div>
			<nav>
				<ul>
					<li><a href="#entree">Entrée</a></li>
					<li><a href="#plat">Plat</a></li>
					<li><a href="#plat_enfant">Plat Enfant</a></li>
					<li><a href="#fromage">Fromage</a></li>
					<li><a href="#dessert">Dessert</a></li>
					<li><a href="#boisson">Boisson</a></li>
				</ul>
			</nav>
		</header>
		<div class="recipe_edit">
			<div id="entree" class="recipe_list">
				<h2>Entrée</h2>
				<ul>
					<?php while($entree = $e->fetch()) { ?>
					<li>
						<img src="../<?= $entree["image"]; ?>">
						<h3><?= $entree["name"] ?> - <?= $entree["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('entrée', '<?= $entree["name"]?>', '<?= $entree["image"] ?>', '<?= $entree["price"] ?>')">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div>
			<button class="add_button" onclick="show_add_recipe_pop_up('entrée');">Ajouter</button>
		</div>

		<div class="recipe_edit">
			<div id="plat" class="recipe_list">
				<h2>Plat</h2>
				<ul>
					<?php while($plat = $p->fetch()) { ?>
					<li>
						<img src="../<?= $plat["image"]; ?>">
						<h3><?= $plat["name"]; ?> - <?= $plat["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('plat', '<?= $plat["name"]?>', '<?= $plat["image"] ?>', '<?= $plat["price"] ?>')">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('plat');">Ajouter</button>
		</div>

		<div class="recipe_edit">
			<div id="plat_enfant" class="recipe_list">
				<h2>Plat Enfant</h2>
				<ul>
					<?php while($enfant = $pe->fetch()) { ?>
					<li>
						<img src="../<?= $enfant["image"]; ?>">
						<h3><?= $enfant["name"]; ?> - <?= $enfant["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('plat_enfant', '<?= $enfant["name"]?>', '<?= $enfant["image"] ?>', '<?= $enfant["price"] ?>')">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('plat_enfant');">Ajouter</button>
		</div>

		<div class="recipe_edit">
			<div id="fromage" class="recipe_list">
				<h2>Fromage</h2>
				<ul>
					<?php while($fromage = $f->fetch()) { ?>
					<li>
						<img src="../<?= $fromage["image"]; ?>">
						<h3><?= $fromage["name"]; ?> - <?= $fromage["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('fromage', '<?= $fromage["name"]?>', '<?= $fromage["image"] ?>', '<?= $fromage["price"] ?>')">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('fromage');">Ajouter</button>
		</div>

		<div class="recipe_edit">
			<div id="dessert" class="recipe_list">
				<h2>Dessert</h2>
				<ul>
					<?php while($dessert = $d->fetch()) { ?>
					<li>
						<img src="../<?= $dessert["image"]; ?>">
						<h3><?= $dessert["name"]; ?> - <?= $dessert["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('dessert', '<?= $dessert["name"]?>', '<?= $dessert["image"] ?>', '<?= $dessert["price"] ?>')">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('dessert');">Ajouter</button>
		</div>

		<div class="drink_edit">
			<div id="boisson" class="drink_list">
				<h2>Boisson</h2>
				<h3>Bière</h3>
				<ul>
					<?php while($biere = $b_B->fetch()) { ?>
					<li>
						<img src="../<?= $biere["image"]; ?>">
						<h3><?= $biere["name"]; ?> - <?= $biere["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $biere["name"]?>', '<?= $biere["image"] ?>', '<?= $biere["price"] ?>', '<?= $biere["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Bière sans alcool</h3>
				<ul>
					<?php while($biere_sans_alcool = $b_BSA->fetch()) { ?>
					<li>
						<img src="../<?= $biere_sans_alcool["image"]; ?>">
						<h3><?= $biere_sans_alcool["name"]; ?> - <?= $biere_sans_alcool["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $biere_sans_alcool["name"]?>', '<?= $biere_sans_alcool["image"] ?>', '<?= $biere_sans_alcool["price"] ?>', '<?= $biere_sans_alcool["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Vin blanc</h3>
				<ul>
					<?php while($vin_blanc = $b_VB->fetch()) { ?>
					<li>
						<img src="../<?= $vin_blanc["image"]; ?>">
						<h3><?= $vin_blanc["name"]; ?> - <?= $vin_blanc["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $vin_blanc["name"]?>', '<?= $vin_blanc["image"] ?>', '<?= $vin_blanc["price"] ?>', '<?= $vin_blanc["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Vin rosé</h3>
				<ul>
					<?php while($vin_rose = $b_VRos->fetch()) { ?>
					<li>
						<img src="../<?= $vin_rose["image"]; ?>">
						<h3><?= $vin_rose["name"]; ?> - <?= $vin_rose["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $vin_rose["name"]?>', '<?= $vin_rose["image"] ?>', '<?= $vin_rose["price"] ?>', '<?= $vin_rose["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Vin rouge</h3>
				<ul>
					<?php while($vin_rouge = $b_VRou->fetch()) { ?>
					<li>
						<img src="../<?= $vin_rouge["image"]; ?>">
						<h3><?= $vin_rouge["name"]; ?> - <?= $vin_rouge["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $vin_rouge["name"]?>', '<?= $vin_rouge["image"] ?>', '<?= $vin_rouge["price"] ?>', '<?= $vin_rouge["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Vin pichet</h3>
				<ul>
					<?php while($vin_pichet = $b_VP->fetch()) { ?>
					<li>
						<img src="../<?= $vin_pichet["image"]; ?>">
						<h3><?= $vin_pichet["name"]; ?> - <?= $vin_pichet["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $vin_pichet["name"]?>', '<?= $vin_pichet["image"] ?>', '<?= $vin_pichet["price"] ?>', '<?= $vin_pichet["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Cidre</h3>
				<ul>
					<?php while($cidre = $b_Ci->fetch()) { ?>
					<li>
						<img src="../<?= $cidre["image"]; ?>">
						<h3><?= $cidre["name"]; ?> - <?= $cidre["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $cidre["name"]?>', '<?= $cidre["image"] ?>', '<?= $cidre["price"] ?>', '<?= $cidre["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Champagne</h3>
				<ul>
					<?php while($champagne = $b_Ch->fetch()) { ?>
					<li>
						<img src="../<?= $champagne["image"]; ?>">
						<h3><?= $champagne["name"]; ?> - <?= $champagne["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $champagne["name"]?>', '<?= $champagne["image"] ?>', '<?= $champagne["price"] ?>', '<?= $champagne["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Autre alcool</h3>
				<ul>
					<?php while($autre_alcool = $b_AA->fetch()) { ?>
					<li>
						<img src="../<?= $autre_alcool["image"]; ?>">
						<h3><?= $autre_alcool["name"]; ?> - <?= $autre_alcool["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $autre_alcool["name"]?>', '<?= $autre_alcool["image"] ?>', '<?= $autre_alcool["price"] ?>', '<?= $autre_alcool["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
				<h3>Soda et autre boisson sans alcool</h3>
				<ul>
					<?php while($sebsa = $b_SEBSA->fetch()) { ?>
					<li>
						<img src="../<?= $sebsa["image"]; ?>">
						<h3><?= $sebsa["name"]; ?> - <?= $sebsa["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $sebsa["name"]?>', '<?= $sebsa["image"] ?>', '<?= $sebsa["price"] ?>', '<?= $sebsa["type"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('boisson', true);">Ajouter</button>
		</div>

		<footer>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300" >
				<path fill="#00ffff" fill-opacity="1" d="M0,128L34.3,138.7C68.6,149,137,171,206,160C274.3,149,343,107,411,112C480,117,549,171,617,160C685.7,149,754,75,823,69.3C891.4,64,960,128,1029,133.3C1097.1,139,1166,85,1234,64C1302.9,43,1371,53,1406,58.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
			</svg>
		</footer>

	</body>

	<script type="text/javascript">
		var pop_up = document.getElementById("recipe_pop_up");
		var table_input = document.getElementById("table_input");
		var pop_up_title = document.getElementById("pop-up-title");
		var label_recipe_name = document.getElementById("label-recipe-name");

		var base_name_input = document.getElementById("base-name");
		var base_image_input = document.getElementById("base-image");
		var base_price_input = document.getElementById("base-price");
		var base_type_input = document.getElementById("base-type");

		var name_input = document.getElementById("recipe-name");

		var browse_button = document.getElementById("file");
		var image_preview = document.getElementById("image_preview");
		var button_choose_image = document.getElementById("browse-file-button");

		var price_input = document.getElementById("recipe-price");

		var drink_type_selecter = document.getElementById("drink-type-selecter");

		var div_pop_up_command = document.getElementById("add-pop-up-command");

		var submit_button = document.getElementById("submit_button");
		var sup_button = document.getElementById("sup");

		button_choose_image.addEventListener("click", () => {
			browse_button.click();
		});

		browse_button.addEventListener("change", function() {
			if(browse_button.files && browse_button.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					image_preview.src = e.target.result;
				};
				reader.readAsDataURL(browse_button.files[0]);
			}
		});

		function show_add_recipe_pop_up(table, drink = false) {
			pop_up.style.visibility = "visible";
			table_input.value = table;
			base_name_input.disabled = true;
			base_image_input.disabled = true;
			base_price_input.disabled = true;
			base_type_input.disabled = true;
			browse_button.setAttribute("required", "");
			div_pop_up_command.id = "add-pop-up-command";
			submit_button.setAttribute("name", "add")
			submit_button.textContent = "Ajouter";
			sup_button.style.display = "none";
			if(drink == true) {
				pop_up_title.textContent = "Ajouter une Boisson :";
				label_recipe_name.textContent = "Nom de la boisson";
				drink_type_selecter.style.display = "block";
			} else {
				pop_up_title.textContent = "Ajouter une recette :";
				label_recipe_name.textContent = "Nom de la recette";
				drink_type_selecter.style.display = "none";
			}
		}

		function show_edit_recipe_pop_up(table, name, image, price, type=undefined) {
			pop_up.style.visibility = "visible";
			table_input.value = table;
			base_name_input.disabled = false;
			base_name_input.value = name;
			base_image_input.disabled = false;
			base_image_input.value = image;
			base_price_input.disabled = false;
			base_price_input.value = price;
			name_input.value = name;
			price_input.value = price;
			browse_button.removeAttribute("required");
			image_preview.src = "../" + image;
			if(type != undefined) {
				pop_up_title.textContent = "Modifier une Boisson :";
				label_recipe_name.textContent = "Nom de la boisson";
				base_type_input.disabled = false;
				base_type_input.value = type;
				document.getElementById(type + "_radio").checked = true;
				drink_type_selecter.style.display = "block";
			} else {
				pop_up_title.textContent = "Modifier une recette :";
				label_recipe_name.textContent = "Nom de la recette";
				base_type_input.disabled = true;
				drink_type_selecter.style.display = "none";
			}

			div_pop_up_command.id = "edit-pop-up-command";
			submit_button.setAttribute("name", "edit");
			submit_button.textContent = "Modifier";
			sup_button.style.display = "inline-block";
		}

		function hide_recipe_pop_up() {
			pop_up.style.visibility = "hidden";
			name_input.value = "";
			image_preview.src = "../img/plat.png";
		}

	</script>

</html>