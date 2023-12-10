<?php
	function enTete()
	{
		$themeClass = isset($_SESSION["theme"]) ? $_SESSION["theme"] : "clair";

		return '<!DOCTYPE html>
					<html>
						<head>
							<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
							<title></title>
							<link rel="stylesheet" type="text/css" href="site.css">
						</head>

						<body class="' . trim($themeClass) . '">';
	}

	function pied()
	{
		return	'</body>
				</html>';
	}
?>