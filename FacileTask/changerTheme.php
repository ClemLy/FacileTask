<?php
	session_start();

	if (!isset($_SESSION["theme"]))
	{
		$_SESSION["theme"] = "clair";
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$_SESSION["theme"] = ($_SESSION["theme"] == "clair") ? "sombre" : "clair";
		header("Location: site.php");
		exit();
	}
?>
