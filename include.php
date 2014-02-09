<?php 
	/* ON prépare le terrain */
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&@#/\\';
	$dico = array("fromage","alambique","casserole","programme","television","logiciel","avion","gourmandise",
            "telechargement","illegalite","instrument","tondeuse","ordinateur","programmation","technologie",
            "diffusion","estampage","navigation","hasardeux","fondations","artistique","utilisation","imbuvable",
            "legume","innovation","constitution","iconique","evidence","invitation","cavite","lampadaire","limonade",
            "bouteille","concours","culture","psychologie","cardiologue","pharmaceutique","laboratoire","scolaire",
            "rasoir","medicament","perfusion","pansement","forage","aiguille","costume","danser","contemporain",
            "mondialisation","environnement","ombrelle","vetement","sentiment","congelateur","spatule","chandelier",
            "bateau","commandant","paquerette","coquelicot","robinetterie","armoiries","boutique","fantome","plaisanterie",
            "ironique","electricite","ingenieur","infirmiere","informatique","biologie","citoyennete","chaussette","confiseries",
            "glacier","bistrot","opticien","elegant","aquatique","piscine","romantique","antiquite","automobile","italienne");

	// Mot de passe aléatoire
	function mdp_aleat($chars){
		// Le script choisi aléatoirement le nombre caractère.
		$nb_char = rand(8, 14);
		// Le nombre de caractères dans la chaine.
		$nb_car = strlen($chars) - 1;
	    $mdp_generate = '';
	    for($i=0; $i < $nb_char; $i++){
	        $car_a_ajouter = $chars[mt_rand(0, $nb_car)];
	        $mdp_generate .= $car_a_ajouter;
	    }
	    return $mdp_generate;
	}

	function mdp_generator($mot_select){
		$nb_char = strlen($mot_select);
		$mdp_generate = $mot_select;
		$a = True;$o = True;$l = True;

		// Si le nombre de caractère est plus petit que 10, on rajoute des chiffres.
		if($nb_char < 10){
			$nb_add = 10 - $nb_char;
			$nb_char = $nb_char + $nb_add;
			for ($i=0; $i < $nb_add; $i++) { 
				$mdp_generate .= mt_rand(0, 9);
			}
		}
		
		// On commence la génération
		for ($i=0; $i < $nb_char; $i++){
			// Si il y a un "a" dans le mot, on le remplace par @ (1 fois).
			if($mdp_generate[$i] == "a" && $a == True){
				$mdp_generate[$i] = "@";
				$a = False;
			}
			// Si il y a un "o" dans le mot, on le remplace par 0 (1 fois).
			elseif($mdp_generate[$i] == "o" && $o == True){
				$mdp_generate[$i] = "0";
				$o = False;
			}
			// Si il y a un "l" dans le mot, on le remplace par 1 (1 fois).
			elseif($mdp_generate[$i] == "l" && $l == True){
				$mdp_generate[$i] = "1";
				$l = False;
			}
			// On remplace quelques minuscule.
			if($i%mt_rand(2,3) == 0){
				$mdp_generate[$i] = strtoupper($mdp_generate[$i]);
			}
		}
		// On retourne le mot de passe générer
		return $mdp_generate;
	} 
?>
