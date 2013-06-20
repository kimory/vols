<?php 

include '../setup.php';

use entity\Personne;
use entity\Client;
use entity\Passager;
use \DateTime;

session_start(); // on passe toujours par cette page, la session est toujours ouverte ici
 
// on récupère le nom du controlleur saisi dans l'URL
$controllerName = $_GET['controller'];
// on récupère la méthode
$methodName = $_GET['method'];

$controllerClassName = "controller\\$controllerName";

try{
    // Code générique. (Quand on arrive sur l'index, on sait qu'on va appeler
    // un controller et une méthode, mais on ne sait pas encore lesquels).
    $class = new ReflectionClass($controllerClassName);
    $instance = $class->newInstance();
    $method = $class->getMethod($methodName);
    $method->invoke($instance);
} catch (Exception $ex){
    include VIEW . 'error.php';
}
?>
