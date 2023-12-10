<?php
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$titre           = $_POST["titre"];
		$description     = $_POST["description"];
		$dateEcheance    = $_POST["dateEcheance"];
		$ordreImportance = $_POST["ordreImportance"];

		$_SESSION['taches'][] = [
			'titre'            => $titre,
			'description'      => $description,
			'dateEcheance'     => $dateEcheance,
			'ordreImportance'  => $ordreImportance
		];

		header("Location: site.php");
		exit();
	}
	else
	{
		header("Location: site.php");
		exit();
	}
?>
