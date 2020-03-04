<?php
require 'config.php';
require 'header.php';
$user_id=$title=$content='';

//grab user id
if (isset($_SESSION['kipande'])){
    $user_id =$_SESSION['kipande'];
    $title =$_POST['title'];
    $content=$_POST['content'];
    echo "$title,$content";
    if(isset($user_id)){
        header("location:login.php");
    }
    if (isset($title)){
        header("location:add");
    }
//    ad post to db
    $sql ="INSERT INTO `posts`(`id`, `user_id`, `title`, `post_content`, `created_at`) VALUES (NULL ,$user_id,$title,$content,NULL)";
    if (mysqli_query($connection, $sql)){
        header("location:index.php");
    }
}
?>
<!--start post  form-->
<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div id="auth-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <fieldset>


                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="number" name="id" class="form-control">
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <textarea name="content" type="text"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info btn-block" name="btn_signup">signup</button>
                        </div>






                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3"></div>

    </div>
</div>

<!--end post form-->















<?php
require 'footer.php';

?>
