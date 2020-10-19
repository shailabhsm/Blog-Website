<?php
include './common/header.php';
$link = mysqli_connect('localhost','root','','blog');
if(isset($_GET['page'])) {
    $pno = $_GET['page'];
} else {
    $pno = 1;
}
?>
                    <div class="row my-5">
                        <div class="col-12 text-center">
                            <h2>My Blog - A Blog Template</h2>
                            <p>Welcome to my blog. Subscribe and get my latest blog post in your inbox.</p>
                            <form>
                                <div class="form-group row justify-content-center">
                                    <div class="col-12 col-md-4 p-1">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="col-12 col-sm-1 p-1">
                                        <input type="submit" value="Subscribe" class="btn btn-success" name="subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    $limit = ($pno-1)*5;
                    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT ".$limit.",5";
                    $sql_run = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($sql_run))
                    {
                        echo '
                            <div class="row">
                                <div class="col-12">
                                    <div class="media">
                                        <img src="./img/posts/'.$row["featured_img"].'" alt="'.$row["title"].'" class="img-thumbnail align-self-start mr-3" width="150" height="150">
                                        <div class="media-body">
                                            <a href="./blog-post.php?id='.$row["id"].'" class="text-dark"><h3>'.$row["title"].'</h3></a>
                                            <p>Published on '.$row["published"].' | 8 comments | '.$row["author"].'</p>
                                            <p>'.substr($row["description"],0, 250).'...</p>
                                            <p><a href="./blog-post.php?id='.$row["id"].'" class="text-dark">Read More &#8594;</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                $query = "SELECT * FROM posts";
                                $query_run = mysqli_query($link, $query);
                                $row_c = mysqli_num_rows($query_run);
                                $maxpg = ceil($row_c/5); 
                                if($row_c > ($pno * 5) && $pno == 1) {
                                    echo '<div class="btn-group btn-block"><a href="#" class="btn btn-success text-white text-center disabled">&#8592; Previous</a><a href="index.php?page='.($pno + 1).'" class="btn btn-success text-white text-center">Next &#8594;</a></div>';
                                } elseif($pno == $maxpg) {
                                    echo '<div class="btn-group btn-block"><a href="index.php?page='.($pno - 1).'" class="btn btn-success text-white text-center">&#8592; Previous</a><a href="#" class="btn btn-success text-white text-center disabled">Next &#8594;</a></div>';
                                } elseif($row_c > ($pno * 5) && $pno != 1 && $pno != $maxpg) {
                                    echo '<div class="btn-group btn-block"><a href="index.php?page='.($pno - 1).'" class="btn btn-success text-white text-center">&#8592; Previous</a><a href="index.php?page='.($pno + 1).'" class="btn btn-success text-white text-center">Next &#8594;</a></div>';
                                } else {
                                    echo '<div class="btn-group btn-block"><a class="btn btn-success text-white text-center disabled">&#8592; Previous</a> <a class="btn btn-success text-white text-center disabled">Next &#8594;</a></div>';
                                }
                            ?>
                        </div>
                    </div>
<?php
    include './common/footer.php'
?>