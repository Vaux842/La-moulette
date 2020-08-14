<?php
include "../database.php";
global $db;

$e = $db->query("SELECT * FROM `entrée`");
$p = $db->query("SELECT * FROM `plat`");
$pe = $db->query("SELECT * FROM `plat_enfant`");
$f = $db->query("SELECT * FROM `fromage`");
$d = $db->query("SELECT * FROM `dessert`");
$b = $db->query("SELECT * FROM `boisson`");

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
				<input type="hidden" id="base-recipe-name" name="base-recipe-name" disabled>
				<input type="hidden" id="base-recipe-image" name="base-recipe-image" disabled>
				<input type="hidden" id="base-recipe-price" name="base-recipe-price" disabled>
				<h3>Nom de la recette :</h3>
				<input type="text" id="recipe-name" name="recipe-name" placeholder="nom de la recette" required>
				<h3>Prix :</h3>
				<input type="number" id="recipe-price" name="recipe-price" max="100" min="0" step="0.05" required><span>€</span>
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

		<div class="recipe_edit">
			<div id="boisson" class="recipe_list">
				<h2>Boisson</h2>
				<ul>
					<?php while($boisson = $b->fetch()) { ?>
					<li>
						<img src="../<?= $boisson["image"]; ?>">
						<h3><?= $boisson["name"]; ?> - <?= $boisson["price"] ?>€</h3>
						<button class="edit_button" onclick="show_edit_recipe_pop_up('boisson', '<?= $boisson["name"]?>', '<?= $boisson["image"] ?>', '<?= $boisson["price"] ?>');">Modifier</button>
					</li>
					<?php } ?>
				</ul>
			</div><button class="add_button" onclick="show_add_recipe_pop_up('boisson');">Ajouter</button>
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

		var base_name_input = document.getElementById("base-recipe-name");
		var base_image_input = document.getElementById("base-recipe-image");
		var base_price_input = document.getElementById("base-recipe-price");

		var name_input = document.getElementById("recipe-name");

		var browse_button = document.getElementById("file");
		var image_preview = document.getElementById("image_preview");
		var button_choose_image = document.getElementById("browse-file-button");

		var price_input = document.getElementById("recipe-price");

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

		function show_add_recipe_pop_up(table) {
			pop_up.style.visibility = "visible";
			pop_up_title.textContent = "Ajouter une recette :";
			table_input.value = table;
			base_name_input.disabled = true;
			base_image_input.disabled = true;
			base_price_input.disabled = true;
			browse_button.setAttribute("required", "");
			div_pop_up_command.id = "add-pop-up-command";
			submit_button.setAttribute("name", "add")
			submit_button.textContent = "Ajouter";
			sup_button.style.display = "none";
		}

		function show_edit_recipe_pop_up(table, name, image, price) {
			pop_up.style.visibility = "visible";
			pop_up_title.textContent = "Modifier une recette :";
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