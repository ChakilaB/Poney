<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <title>Poney Fringuant</title>
</head>
<body>
<nav>
 
  <ul>
  <li><a href="#"><img src="Poney Fringuant logo.png" alt="logo" width=50px></a></li>
  <li><a href="#Accueil">Accueil</a></li>
  <li><a href="#Actualité">Actualité</a></li>
  <li><a href="#contact">Contact</a></li>
  
  <li style="float:right"><a class="active" href="#about">Connexion</a></li>
  
</ul>

</nav>

<?php


 
/* Récupération des variables issues du formulaire par la méthode post*/
$adherent = filter_input(INPUT_POST, 'adherent');
$prenom = filter_input(INPUT_POST, 'pass');
$adherent = filter_input(INPUT_POST, 'prenom');
$nom = filter_input(INPUT_POST, 'nom');
$pseudo = filter_input(INPUT_POST, 'pseudo');
$password = filter_input(INPUT_POST, 'password');
$email= filter_input(INPUT_POST, 'email');
$numero = filter_input(INPUT_POST, 'numero');
$adresse1 = filter_input(INPUT_POST, 'adresse1');
$code_postal = filter_input(INPUT_POST, 'code_postal');
$ville = filter_input(INPUT_POST, 'ville');
$dateAdhesion = filter_input(INPUT_POST, 'dateAdhesion');

 
/* Si le formulaire est envoyé */
if (isset($adherent,$prenom,$adherent,$nom,$pseudo,$password,$email,$numero,$adresse1,$code_postal,$ville,$dateAdhesion ))
{  
 
    /* Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces  */
    $pseudo = trim($pseudo) != '' ? $pseudo : null;
    $pass = trim($pass) != '' ? $pass : null;
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    
 
    /* Si différents de null */
    if(isset($pseudo,$pass,$adherent,$prenom,$adherent,$nom,$pseudo,$password,$email,$numero,$adresse1,$code_postal,$ville,$dateAdhesion)
    {
    /* Connexion au serveur */
    $hostname = "localhost";
    $database = "poney";
    $username = "Lola";
    $password = "coucou";
     
    /* Configuration des options de connexion */
     
    /* Désactive l'éumlateur de requêtes préparées (hautement recommandé)  */
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
     
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
     
    /* Connexion */
    try
    {
      $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, $pdo_options);
    }
    catch (PDOException $e)
    {
      exit('problème de connexion à la base');
    }
         
     
     
    try
    {
      /* préparation de la requête*/
      $req_prep = $connect->prepare($requete);
       
      /* Exécution de la requête*/
      $req_prep->execute(array(0=>$pseudo));
       
      /* Récupération du résultat */
      $resultat = $req_prep->fetchColumn();
       
      if ($resultat == 0)
      /* Résultat du comptage pour pseudo peut  l'enregistrer */
      {
          
        /* préparation de l'insertion */
        $insert_prep = $connect->prepare($insertion);
         
        /* Exécution de la requête en passant les marqueurs et leur variables associées dans un tableau*/
          $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $inser_exec = $insert_prep->execute(array(':nom'=>$pseudo,':password'=>$pass));
         
        /* Si Insertion s'est faite correctement...*/
        if ($inser_exec === true)
        {
          /* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session*/
          if (!session_id()) session_start();
          $_SESSION['login'] = $pseudo;
           
          
          $message = 'Votre inscription est enregistrée.';
        }  
      }
      else
      {   
        $message = 'Ce pseudo est déjà utilisé, changez-le.';
      }
    }
    catch (PDOException $e)
    {
      $message = 'Problème dans la requête d\'insertion';
    }  
  }
  else
  {   
    $message = 'Tout les champs doivent être remplis';
  }
}
?>


<div id="formulaire">


    <Form action="config.php" method="POST"> 

    <h1>Inscription</h1>

    <img src="unicorn-3782539_1280.png" alt="image" width=80px>
    
    <div id="Nom">
    <input type="text" placeholder="Nom">
    </div>
     

    <div id="Prénom">
    <input type="text" placeholder="Prénom">
    </div>

    <div id="Pseudo">
    <input type="text" placeholder="Pseudo">
    </div>

    <div id="Password">
    <input type="text" placeholder="Mot de passe">
    </div>

    <div id="Confirmer">
    <input type="text" placeholder="Confirmer Mot de passe">
    </div>
    

    <div id="email">
    <input type="text" placeholder="email">
    </div>

    <div id="numero ">
    <input type="text" placeholder="Numero adhérent">
    </div>

    <div id="email">
    <input type="text" placeholder="Mail">
    </div>

    <div id="adresse1">
    <input type="text" placeholder="Adresse">
    </div>

    <div id="code postal">
    <input type="text" placeholder="Code postale">
    </div>

    <div id="ville">
    <input type="text" placeholder="Ville">
    </div>

    <div id="dateAdhesion">
    <input type="text" placeholder="Date d'Adhésion">
    </div>

    <div id="dateAdhesion">
    <input type="text" placeholder="Date d'Adhésion">
    </div>

    

  <div id="button">
   <input type="submit" value="Inscription" />
  </div>

    
    </Form>



</body>
</html>