<?php
require "../database.php";
global $db;

if(isset($_POST)) {
	if(isset($_POST["sup"])) {

		unlink("../" . $_POST["base-image"]);

		$sql = "DELETE FROM " . $_POST["table_input"] . " WHERE name='" . $_POST["base-name"] . "'";
		$req = $db->prepare($sql);
		$req->execute();
	}

	else if(isset($_POST["edit"])) {
		if(isset($_POST["recipe-name"]) && !empty($_POST["recipe-name"]) && $_POST["base-name"] != $_POST["recipe-name"]) {
			$sql = "UPDATE " . $_POST["table_input"] . " SET `name`=\"" . $_POST["recipe-name"] . "\" WHERE name=\"" . $_POST["base-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
		if(isset($_FILES["recipe-image"]["name"]) && !empty($_FILES["recipe-image"]["name"]) && end(explode("/", $_POST["base-image"])) != $_FILES["recipe-image"]["name"]) {

			unlink("../" . $_POST["base-image"]);

			$file = $_FILES["recipe-image"];
			$fileName = $_FILES["recipe-image"]["name"];
			$fileTmpName = $_FILES["recipe-image"]["tmp_name"];

			$fileExt = explode(".", $fileName);
			$fileExt = strtolower(end($fileExt));
			$fileDest = "../img/recipes/" . $fileName;
			move_uploaded_file($fileTmpName, $fileDest);

			$sql = "UPDATE " . $_POST["table_input"] . " SET `image`=\"" . end(explode("../", $fileDest)) . "\" WHERE name=\"" . $_POST["base-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
		if(isset($_POST["recipe-price"]) && !empty($_POST["recipe-price"]) && $_POST["base-price"] != $_POST["recipe-price"]) {
			$sql = "UPDATE " . $_POST["table_input"] . " SET `price`=\"" . $_POST["recipe-price"] . "\" WHERE name=\"" . $_POST["base-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
		if(isset($_POST["drink-type"]) && $_POST["base-type"] != $_POST["drink-type"]) {
			$sql = "UPDATE " . $_POST["table_input"] . " SET `type`=\"" . $_POST["drink-type"] . "\" WHERE name=\"" . $_POST["base-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
	}

	else if(isset($_POST["add"])) {
		$file = $_FILES["recipe-image"];
		$fileName = $_FILES["recipe-image"]["name"];
		$fileTmpName = $_FILES["recipe-image"]["tmp_name"];

		$fileExt = explode(".", $fileName);
		$fileExt = strtolower(end($fileExt));
		$fileDest = "../img/recipes/" . $fileName;
		move_uploaded_file($fileTmpName, $fileDest);

		if(isset($_POST["drink-type"])) {
			$sql = "INSERT INTO `" . $_POST['table_input'] . "`(`name`, `image`, `price`, `type`) VALUES ('" . $_POST["recipe-name"] . "', '" . explode("../", $fileDest)[1] . "', '" . $_POST["recipe-price"] . "', '" . $_POST["drink_type"] . "')";
		} else {
			$sql = "INSERT INTO `" . $_POST['table_input'] . "`(`name`, `image`, `price`) VALUES ('" . $_POST["recipe-name"] . "', '" . explode("../", $fileDest)[1] . "', '" . $_POST["recipe-price"] . "')";
		}
		$req = $db->prepare($sql);
		$req->execute();
	}
	if(isset($_POST["menu_of_the_day_entree_selecter"]) && $_POST["menu_of_the_day_entree_selecter"] != $_POST["base_motd_entree"]) {
		$sql = "UPDATE `menu_of_the_day` SET `entrée`=\"" . $_POST["menu_of_the_day_entree_selecter"] ."\"";
		$req = $db->query($sql);
		$req->execute();
	}
	else if(isset($_POST["menu_of_the_day_plat_selecter"]) && $_POST["menu_of_the_day_plat_selecter"] != $_POST["base_motd_plat"]){
		$sql = "UPDATE `menu_of_the_day` SET `plat`=\"" . $_POST["menu_of_the_day_plat_selecter"] ."\"";
		$req = $db->query($sql);
		$req->execute();
	}
	else if(isset($_POST["menu_of_the_day_dessert_selecter"]) && $_POST["menu_of_the_day_dessert_selecter"] != $_POST["base_motd_dessert"]){
		$sql = "UPDATE `menu_of_the_day` SET `dessert`=\"" . $_POST["menu_of_the_day_dessert_selecter"] ."\"";
		$req = $db->query($sql);
		$req->execute();
	}
	else if(isset($_POST["menu_of_the_day_drink_selecter"]) && $_POST["menu_of_the_day_drink_selecter"] != $_POST["base_motd_drink"]){
		$sql = "UPDATE `menu_of_the_day` SET `boisson`=\"" . $_POST["menu_of_the_day_drink_selecter"] ."\"";
		$req = $db->query($sql);
		$req->execute();
	}
	else if(isset($_POST["menu_of_the_day_price"]) && $_POST["menu_of_the_day_price"] != $_POST["base_motd_price"]){
		$sql = "UPDATE `menu_of_the_day` SET `price`=\"" . $_POST["menu_of_the_day_price"] ."\"";
		$req = $db->query($sql);
		$req->execute();
	}
}
header("location:admin.php");
?>