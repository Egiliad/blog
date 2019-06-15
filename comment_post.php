<?php include('config/db_config.php');?>
<?php if(isset($_POST['addComment'])){
    $comment = $_POST['comment'];
    $post = $_POST['post'];

    $query3 = "INSERT INTO comments (post_id,body) VALUES('$post', '$comment')";
    mysqli_query($conn,$query3);
    header('location:comment_post.php?postid='.$post ); //Redirecting back to index.php after inserting data
} ?>



<?php if(isset($_REQUEST['postid'])) {
    $postid = $_REQUEST['postid'];
?>
<html>
    <head>
        <title>Post Details</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div><button class="btn_home"><a  class="link" href="index.php" >Back Home</a></button></div>
        
        <?php
            include('config/db_config.php');

            // Fetch users
            $query = "Select * from posts where id = '$postid'";
            $query2 = "Select * from comments where post_id = '$postid'";
            $result = mysqli_query($conn, $query);
            $result2 = mysqli_query($conn, $query2);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="content">';
                while($member = mysqli_fetch_array($result)) {?>
                    <div>
                        <p class="com_title"><?= $member['title'] ?></p>
                        <img src="<?= $member['picture'] ?>"/>
                        <p class=""><?= $member['description'] ?></p>


                    <form class ="comment_body" method="post" enctype="multipart/form-data" action="">
                                  <?php
                if (mysqli_num_rows($result2) > 0) {
                echo '<quote>';
                    while($member2 = mysqli_fetch_array($result2)) {?>
                        <p><?= $member2['body'] ?></p>
                        <p style="font-size: 14px;"><i><?= $member['created_date'] ?></i></p>
                <?php }
                echo '</quote>';
                }?>

                   <input type="hidden" name="post" value = '<?php echo $postid;?>' />

                    <div style="margin-left: 20px;" class="">
                      <textarea id="this_text" title="comment" id="comment" name="comment" placeholder="Your Comment here"></textarea>
                    </div>
                    <div class="">
                      <button class="add_btn" type="submit" name = "addComment" title="addComment">Add Comment</button>
                    </div>
                </form>

      


                    </div>
                <?php }
                echo '</div>';
                ?>


            <?php } else {?>
                <h2>No Posts Available!</h2>
            <?php }
        ?>
    </body>
</html>
<?php } else header('location:index.php')?>