<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	session_start();

	include "fctAux.inc.php";
	
	echo enTete();
	echo site();
	echo pied();

	function site()
	{
		echo '<div class="haut">
				FacileTask
			</div>
			
			<div class="ajoutTaches">
				<form action="changerTheme.php" method="post">
					<button type="submit">Changer de thème</button>
				</form>

				<form action="ajouterTache.php" method="post">
					<label for="titre">Titre</label>
					<input type="text" id="titre" name="titre" required>

					<label for="description">Description</label>
					<textarea id="description" name="description" required></textarea>

					<label for="dateEcheance">Date d\'échéance</label>
					<input type="date" id="dateEcheance" name="dateEcheance" required>

					<div class="radio">
					<label>Ordre d\'importance</label>
					<ul>
						<label for="important">Important</label>
						<input type="radio" id="important" name="ordreImportance" value="Important" required>

						<label for="neutre">Neutre</label>
						<input type="radio" id="neutre" name="ordreImportance" value="Neutre" required>

						<label for="Peu Important">Peu Important</label>
						<input type="radio" id="peuImportant" name="ordreImportance" value="Peu Important" required>
					</ul>
					</div>

					<button type="submit">Ajouter une tâche</button>
				</form>
			</div>';

		afficherTache();
	}

	function afficherTache()
	{
		trierTaches();

		if (isset($_SESSION['taches']) && !empty($_SESSION['taches']))
		{
			echo '<div class="listeTaches">
					<h2>Liste des tâches</h2>
					<ul>';
			foreach ($_SESSION['taches'] as $index => $tache)
			{
				echo '<li> Titre : ' . $tache['titre'] . ' -  Description : ' . $tache['description'] . ' -  Date : ' . $tache['dateEcheance'] . ' -  Importance : '. $tache['ordreImportance'] .'
						<form action="supprimerTache.php" method="post" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer cette tâche ?\');">
							<input type="hidden" name="index" value="' . $index . '">
							<button type="submit">Supprimer</button>
						</form>
					</li>';
			}
			echo '</ul>
				</div>';
		}
	}


	function trierTaches()
	{
		usort($_SESSION['taches'], function ($a, $b)
		{
			$valeurImportance = ['Important' => 3, 'Neutre' => 2, 'Peu Important' => 1];
	
			$dateA = strtotime($a['dateEcheance']);
			$dateB = strtotime($b['dateEcheance']);
	
			if ($dateA !== $dateB)
			{
				return $dateA - $dateB;
			}

			return $valeurImportance[$b['ordreImportance']] - $valeurImportance[$a['ordreImportance']];
		});
	}
?>