<?php session_start(); ?>

<?php
include '../setup.php';
// on récupère le nom du controlleur saisi dans l'URL
$controllerName = $_GET['controller'];
// on récupèrera la méthode
$methodName = $_GET['method'];

$controllerClassName = "controller\\$controllerName";

try{
    // Code générique : quand on arrive sur l'index, on sait qu'on va appeler
    // un controller et une méthode, mais on ne sait pas encore lesquels.
    $class = new ReflectionClass($controllerClassName);
    $instance = $class->newInstance();
    $method = $class->getMethod($methodName);
    $method->invoke($instance);
} catch (Exception $ex){
    include VIEW . 'error.php';
}
?>
