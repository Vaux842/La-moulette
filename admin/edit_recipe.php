<?php
require "../database.php";
global $db;

if(isset($_POST)) {
	if(isset($_POST["sup"])) {

		unlink("../" . $_POST["base-recipe-image"]);

		$sql = "DELETE FROM " . $_POST["table_input"] . " WHERE name='" . $_POST["base-recipe-name"] . "'";
		$req = $db->prepare($sql);
		$req->execute();
	}

	else if(isset($_POST["edit"])) {
		if(isset($_POST["recipe-name"]) && !empty($_POST["recipe-name"]) && $_POST["base-recipe-name"] != $_POST["recipe-name"]) {
			$sql = "UPDATE " . $_POST["table_input"] . " SET `name`=\"" . $_POST["recipe-name"] . "\" WHERE name=\"" . $_POST["base-recipe-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
		if(isset($_FILES["recipe-image"]["name"]) && !empty($_FILES["recipe-image"]["name"]) && end(explode("/", $_POST["base-recipe-image"])) != $_FILES["recipe-image"]["name"]) {

			unlink("../" . $_POST["base-recipe-image"]);

			$file = $_FILES["recipe-image"];
			$fileName = $_FILES["recipe-image"]["name"];
			$fileTmpName = $_FILES["recipe-image"]["tmp_name"];

			$fileExt = explode(".", $fileName);
			$fileExt = strtolower(end($fileExt));
			$fileDest = "../img/recipes/" . $fileName;
			move_uploaded_file($fileTmpName, $fileDest);

			$sql = "UPDATE " . $_POST["table_input"] . " SET `image`=\"" . end(explode("../", $fileDest)) . "\" WHERE name=\"" . $_POST["base-recipe-name"] . "\"";
			$req = $db->prepare($sql);
			$req->execute();
		}
		if(isset($_POST["recipe-price"]) && !empty($_POST["recipe-price"]) && $_POST["base-recipe-price"] != $_POST["recipe-price"]) {
			$sql = "UPDATE " . $_POST["table_input"] . " SET `price`=\"" . $_POST["recipe-price"] . "\" WHERE name=\"" . $_POST["base-recipe-name"] . "\"";
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

		$sql = "INSERT INTO `" . $_POST['table_input'] . "`(`name`, `image`, `price`) VALUES ('" . $_POST["recipe-name"] . "', '" . explode("../", $fileDest)[1] . "', '" . $_POST["recipe-price"] . "')";
		$req = $db->prepare($sql);
		$req->execute();
	}
}
header("location:admin.php");
?>