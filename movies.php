<?php
require_once ("includes/header.php");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createMoviesPreviewVideo();

$containers = new CaregoryContainers($con, $userLoggedIn);
echo $containers->showMoviesCategories();

?>