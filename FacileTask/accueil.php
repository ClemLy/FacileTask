<?php
	session_start();

	include "fctAux.inc.php";

	echo enTete();
	echo accueil();
	echo pied();

	function accueil()
	{
		echo ' <div class="accueil">
					<h1>Bienvenue sur FacileTask</h1>
						<form action="site.php" method="post">
						<button type="submit" name="acceder">Accéder</button>
					</form>

					<div class="reseaux-sociaux">
						<a href="https://github.com/ClemLy" target="_blank">
							<img src="githubLogo.png" alt="Github" style="width: 100px; height: auto;">
						</a>

						<a href="https://www.linkedin.com/in/cl%C3%A9mentin-ly/" target="_blank">
							<img src="linkedinLogo.png" alt="Linkedin" style="width: 100px; height: auto;">
						</a>
					</div>

					<footer>Clémentin LY - 2023</footer>
				</div>';
	}
?>