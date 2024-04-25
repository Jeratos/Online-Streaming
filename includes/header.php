<?php
require_once ("includes/config.php");

require_once ("includes/classes/PreviewProvider.php");
require_once ("includes/classes/CategoryContainers.php");
require_once ("includes/classes/Entity.php");

require_once ("includes/classes/EntityProvider.php");
require_once ("includes/classes/ErrorMessage.php");
require_once ("includes/classes/SeasonProvider.php");
require_once ("includes/classes/Season.php");
require_once ("includes/classes/Video.php");
require_once ("includes/classes/VideoProvider.php");
require_once ("includes/classes/User.php");


if (!isset ($_SESSION["userLoggedIn"])) {

    header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcom to reeceflix</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/70818555f8.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</head>

<body>

    <div class="wrapper">
        
    <?php
    if(!isset($hideNav)) {
        include_once ("includes/navBar.php");
    }
    ?>