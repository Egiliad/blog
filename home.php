<html>
    <head>
        <title>Post List</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div class="blog-post" >
            <div class="header">

                <h2 class="post_header">Posts List</h2>
                <button  style="" class="add_button">
                      
                    <a class="link" href="addPost.php">
                        Add Post
                    </a></button>

            </div>

            
            <?php
                include('config/db_config.php');

                // Fetch users
                $query = "Select * from posts";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="content">';
                    while($member = mysqli_fetch_array($result)) {?>
                        <div class="wrapper">
                            <h2 class="header_home"><?= $member['title'] ?></h2>
                            <img src="<?= $member['picture'] ?>"/>
                            <p> <?= $member['description'] ?></p>
                            <p><i>Posted on: <?= $member['created_date'] ?></i></p>

                            <div class="read"><button ><a href="comment_post.php?postid=<?php echo $member['id']?>">Read More>>></a></button></div>
                        </div>
                    <?php }
                    echo '</div>';
                } else {?>
                    <h2>No Posts available!</h2>
                <?php }
            ?>
        </div>
    </body>
</html>