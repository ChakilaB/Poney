<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <title>Poney Friguant</title>
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

<div id="formulaire">



<!--- Partit connexion--->

    <Form action="inscription.php" method="POST"> 

    <img src="unicorn-3782539_1280.png" alt="image" width=80px>
    
    <div id="email">
    <p><label for="email">Mail</label>: <input type="text" name="email"  id="email">
    </p>
    </div>

    <div id="mdp">
    <br />
    <label for="pass"> Mot de passe :</label>
    <input type="password" name="pass" id="pass" />
    </div>

  <div id="button">
   <input type="submit" value="Connexion" />
  </div>
     
    <div id="href">
    <a href="">Mot de passe oublié ?</a>
    <a href="inscription.php">Crée un compte</a>
    </div>
    
    </Form>

    </div>

    <?php ?>

</body>
</html>