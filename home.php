<?php 
include("includes/init.php"); 
include("includes/header.php"); 

function display ($post) {
    $title = $post->title;
    $description = $post->description;
    $media_type = $post->mediaType;
    $likes = $post->likes;
    $url = $post->media?>
    <div class = "post_box">
    <!--  -->
    <?php if ($media_type == "Image") { ?>
        <img class="media" src="<?php echo $url?>" alt="Media">
    <?php } elseif ($media_type == "video") { ?>
        <iframe class="media" src="https://www.youtube.com/embed/NUK8eRaZId4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php }
    else { ?>
        <img class="media" src="images/imageplaceholder.jpg" alt="Media">
        
    <?php }?>
    <h2> <?php echo $title ?></h2>
    <p> <?php echo $description ?> </p>
    <img class="heart" src="images/heart.png" alt="Heart"> 
    <p class = "likes"> <?php echo $likes ?> </p>
    </div>
<?php } ?>




<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="styles/theme.css" media="all" />


<button class="new_post_button" onclick="location.href='upload.php'" name="new_post_submit"> + New Post </button>

<img class="user_icon" src="images/user-icon.png" alt="User Icon"> 

<button class="logout_button" onclick="location.href='login.php'"name="logout_submit"> Logout </button>


<div class="center">
    <div class="tab">
        <button class="<?php echo $latest_selected ?>" onclick="changeLatest()">Latest</button>
        <button class="<?php echo $popular_selected ?>" onclick="changePopular()">Most Popular</button>
        <button class="<?php echo $priority_selected ?>" onclick="changePriority()">Priority</button>
        <button class="<?php echo $your_posts_selected ?>" onclick="changeYourPosts()">Your Posts</button>
    </div>

    <div class="issues_box">
        <!-- <div class = "post_box"> -->
        <?php
        $data = file_get_contents('https://ibm-hackathon-backend.herokuapp.com/api/posts');
        $decodedData = json_decode($data);
        //$title = $decodedData[0]->title;
        //$description = $decodedData[0]->description;
        foreach ($decodedData as $obj) {
            display($obj);
        }
        ?>
        <!-- </div>-->
    </div> 
</div>



</html>