
<?php
 require_once '../vendor/autoload.php';

$db= new PDO('mysql:host=localhost;dbname=annuaire','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//On determine l'expression a rechercher
 $h = $_POST['name'];
 

  $rea = $db->prepare('SELECT * FROM `film` WHERE `nom_film`like "%":h"%"');
$rea->execute(array(
        'h' => $h));


if(isset($_POST['recherche']))
{
$loader = new Twig_loader_Filesystem('../view/frontend');
    $twig= new Twig_Environment($loader,[
        'cache' =>false, //__DIR__.'/temp'
    ]);


    echo $twig->render("recherche.twig",['rea'=>$rea]);

}


?>