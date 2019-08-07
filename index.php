<?php 
session_start();
//config
require('config.php');

//classes
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

//controllers
require('controllers/home.php');
require('controllers/collections.php');
require('controllers/users.php');
require('controllers/albums.php');
require('controllers/artists.php');

//Models
require('models/home.php');
require('models/collection.php');
require('models/user.php');
require('models/album.php');
require('models/artist.php');
$bootstrap=new Bootstrap($_GET);

$controller =$bootstrap->createController();
if($controller){
    $controller->executeAction();
}