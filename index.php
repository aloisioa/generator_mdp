<?php 
	// Titre de la page.
	$title = "Générateur de mot de passe";

	// On inclut le fichier contenant les functions
	include('include.php');

	// Génération du mot de passe moyen
	$mot_select = $dico[array_rand($dico)];
	$mdp_generate = mdp_generator($mot_select);

	// Si l'utilisateur envoie des données on la vérifie, et on la génére.
	if(isset($_POST['submit'])){
		// On sécurise la variable.
		$_POST['mot_user'] = htmlspecialchars($_POST['mot_user']);
		// Vérifications, le mot doit être composer que de lettres.
		if(preg_match("/^[a-zA-Z]+$/",$_POST['mot_user'])){
			// Le mot doit contenir entre 4 et 16 caractères.
			if(strlen($_POST['mot_user']) >= 4 AND strlen($_POST['mot_user']) <= 16){
				$user_mot = $_POST['mot_user'];
				$user_generate = mdp_generator($user_mot);
			}else{
				$error = "Mot de passe doit contenir entre 4 et 16 caractères.";
			}
		}else{
			$error = "Entrer un mot, sans chiffre(s).";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="wrapper">
		<header>
			<h1><?php echo $title; ?></h1>
		</header>
		<div id="content">
			<span class="title">Mot de passe générer automatiquement (mémorisation : HARD)</span>
			<span class="result"><?php echo mdp_aleat($chars); ?></span>
			
			<span class="title">Mot de passe générer automatiquement (mémorisation : MOYEN)</span>
			<span class="result"><?php echo '"'.$mot_select.'" => '.$mdp_generate.''; ?></span>

			<?php 
				if(isset($user_mot)){
					echo '<span class="title">Votre mot de passe</span><span class="result">"'.$user_mot.'" => '.$user_generate.'</span>'; 
				}
			?>

			<div id="form">
				<p>Générer votre mot de passe : <span class="error"><?php if(isset($error)){ echo $error; } ?></span></p>
				<form action="" method="post">
					<input type="text" name="mot_user" id="mot_user">
					<input type="submit" name="submit" id="submit">
				</form>
			</div>
		</div>
		<footer>
			<p>Développer par Aloisio Alessandro.</p>
		</footer>
	</div>
</body>
</html>
