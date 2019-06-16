<?php include('config/db_config.php');
     //initializing variables
     $title = "";
     $description = "";
     $picture = "";
     $file_name = "";

//if Save button clicked
if(isset($_POST['addPost'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Check for file
    if (isset($_FILES['fileToUpload'])) {
      $file_name = $_FILES['fileToUpload']['name'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      move_uploaded_file($file_tmp,"images/".$file_name);

  }

    $query = "INSERT INTO posts (title,description,picture) VALUES('$title', '$description', '$file_name')";
    mysqli_query($conn,$query);
    header('location:index.php'); //Redirecting back to index.php after inserting data
} ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Add Post</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>

   <div>
    <button class="btn_back">
      <a  class="link_back_home" href="index.php" >Back Home</a>
    </button></div>
  <div class="blog-posts">
    <div class="header"><span>Add New Post</span></div>
    <form method="post" enctype="multipart/form-data" action="addPost.php">
        <div class="input-group">
          <label class="input-post">Post Title</label>
          <input class="text" type="text" title="title" placeholder="title here" name="title">
        </div>
        <div class="post-desc">
          <label class="descr">Description</label>
          <textarea class="textarea" title="description" name="description"></textarea>
        </div>
        <div class="input-group">
            <label class="input-picture">Picture</label>
            <input type="file" title="fileToUpload"name="fileToUpload" id="fileToUpload">
        </div> 
        <div class="input-group">
          <button class="btn" type="submit" name = "addPost" title="addPost">Add Post</button>
        </div>
    </form>
  </div>
 </body>
</html>