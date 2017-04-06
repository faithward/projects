<?php
ini_set('display_errors', '1');
require_once('vendor/autoload.php');

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

//$json = file_get_contents('data.json');
//$projects = json_encode($json);

$args = array(
	"assetsURL" => "/app/assets/",
	"title" => "Project Repository for the Breathe Code Movement",
	"logo" => array(
			"url" => "/app/assets/img/breathe-code-logo.png",
			"alt" => "Breath Code Movement Logo"
		)
	//"projects" => $projects
	);

if(isset($_GET['classroom'])) $classroom = $_GET['classroom'];

if(isset($classroom) and $classroom!='') $template = $twig->load('classroom.html');
else $template = $twig->load('index.html');

echo $template->render($args);