<?php
class PreviewProvider
{
    private $con, $username;
    public function __construct($con, $username)
    {
        $this->con = $con;
        $this->username = $username;

    }

    public function createTvShowPreviewVideo(){
        $entitiesArray= EntityProvider::getTvShowEntities($this->con, null,1);
        if(sizeof($entitiesArray)==0){
            ErrorMessage::show("no Tv show to display");

        }
        return $this->CreatePreviewVideo($entitiesArray[0]);
    }
    public function createCategoryPreviewVideo($categoryId){
        $entitiesArray= EntityProvider::getEntities($this->con, $categoryId, 1);
        if(sizeof($entitiesArray)==0){
            ErrorMessage::show("no Tv show to display");

        }
        return $this->CreatePreviewVideo($entitiesArray[0]);
    }
    public function createMoviesPreviewVideo(){
        $entitiesArray= EntityProvider::getMoviesEntities($this->con, null,1);
        if(sizeof($entitiesArray)==0){
            ErrorMessage::show("no Movies to display");

        }
        return $this->CreatePreviewVideo($entitiesArray[0]);
    }

    public function CreatePreviewVideo($entity)
    {
        if ($entity == null) {
            $entity = $this->getRandomEntity();
        }
        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();




        $videoId= videoProvider::getEntityVideoForUser($this->con, $id, $this->username);
        $video = new video($this->con, $videoId);
       

        $inProgress = $video->isInProgress($this->username);
        $playButtonText= $inProgress ? "continue watching":"play";
        $seasonEpisode= $video->getSeasonAndEpisode();
        $suHeading= $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";


        return "<div class='previewContainer'>

<img src='$thumbnail'  class='previewImage' hidden >

 <video autoplay muted class='previewVideo' onended='previewEnded()'>

 <source src='$preview' type='video/mp4'>

</video>

<div class='previewOverlay'>

<div class='mainDetails'>
<h3>$name</h3>
$suHeading

<div class='buttons'>
   <button onclick='watchVideo($videoId)'><i class='fa-solid fa-play'></i> $playButtonText</button>
   <button onclick='volumeToggele(this)'><i class='fa-solid fa-volume-mute'></i></button>

</div>



</div>
</div> 

</div>";
    }

    public function creatEntityPreviewSquar($entity){
          $id=$entity->getId();
          $thumbnail=$entity->getThumbnail();
          $name=$entity->getName();

return "<a href='entity.php?id=$id'>
              <div class='previewContainer small'>
                   <img src='$thumbnail' title='$name'>

              </div> 

              </a>

";

    }  

    private function getRandomEntity()
    {

    $entity= EntityProvider::getEntities($this->con,null,1);
    return $entity[0];
    }
}
?>