<?php 

/* --------------------------------- Modèles -------------------------------- */
require_once('App/Model.php');
// You can add your models here

/* ------------------------------- Controllers ------------------------------ */
require_once('App/Controller.php');

/* ---------------------------------- Utils --------------------------------- */
require_once('Utils/header.php');


// Add your controllers here
$controllers=['home'];

$controller_default='home';

if(isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
{
    $nom_controller=$_GET['controller'];
}
else
    $nom_controller=$controller_default;

$nom_classe="Controller_".$nom_controller;
$nom_fichier="Controllers/".$nom_classe.".php";


if(file_exists($nom_fichier))
{
    require_once("$nom_fichier");
    $controller=new $nom_classe();
}
else 
    exit("ERROR 404:not found");

    // Uncomment below if you want a footer 
// require_once('Utils/footer.php');

