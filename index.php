<?php
require_once("includes/header.php");

$preview= new PreviewProvider($con, $userLoggedIn);
echo $preview->CreatePreviewVideo(null);

$containers= new CaregoryContainers($con, $userLoggedIn);
echo $containers->showAllCategories();
?>