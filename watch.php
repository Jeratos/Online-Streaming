<?php
$hideNav = true;

require_once("includes/header.php");
if(!isset($_GET["id"])){
    ErrorMessage::show("No ID passed into page");
    }
  
$user= new User($con, $userLoggedIn);

if(!$user->getIsSubscribed()){
    ErrorMessage::show("you must be subscribed to see this.
    <a href='profile.php'>Click here to subscribed</a>"); 
}


    $video= new Video($con, $_GET["id"]);
     $video->incrementViews();
     $upNextVideo= VideoProvider::getUpNext($con, $video);
?>
<div class="watchContainer">

<div class="videoControls watchNav">
<button onclick="goBack()"><i class="fa-solid fa-arrow-left"></i> </button>
<h1><?php echo $video->getTitle(); ?></h1>
</div>

<div class="videoControl upNext" style="display:none">
<button onclick="restartVideo();" class="redo"><i class="fa-solid fa-redo"></i></button>
<div class="upNextContainer">
    <h2>Up next:</h2>
    <h3><?php echo $upNextVideo->getTitle(); ?></h3>
    <h3><?php echo $upNextVideo->getSeasonAndEpisode(); ?></h3>
    <button onclick="watchVideo(<?php echo $upNextVideo->getId(); ?>)" class="playNext">
    <i class="fa-solid fa-play"></i>play
    </button>

</div>
</div>

<video controls autoplay onended="showUpNext()">
<source src='<?php echo $video->getFilePath(); ?>' type="video/mp4">    

</video>
</div>
<script>
    initVideo("<?php echo $video->getId(); ?>", "<?php echo $userLoggedIn; ?>");
</script>