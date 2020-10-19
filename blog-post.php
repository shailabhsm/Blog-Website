<?php
include './common/header.php';
$id = $_GET['id'];
$link = mysqli_connect('localhost','root','','blog');

$sql = "SELECT * FROM posts WHERE id = '".$id."'";
$sql_run = mysqli_query($link, $sql);
$result = mysqli_fetch_array($sql_run);

$title = $result['title'];
$desc = $result['description'];
$publish = $result['published'];
$post_img = $result['post_img'];
$author = $result['author'];

echo '
    <div class="row p-5">
    <div class="col-12">
        <h3>
        '.$title.'
        </h3>
        <p>Published on '.$publish.' | 8 comments | '.$author.'</p>
        <div class="text-center">
            <img src="./img/posts/'.$post_img.'" alt="'.$title.'" class="img-fluid p-3">
        </div>
        <p>'.$desc.'</p>  
        <div class="btn-group btn-block">
            <button class="btn btn-success border-right">
            &#8592; Previous
            </button>
            <button class="btn btn-success border-left">
                Next &#8594;
            </button>
        </div>
    </div>
    </div>
';

?>
    <div class="row p-5">
        <div class="col-12">
            <h2>Comments</h2>
            <form>
                <div class="form-group row">
                    <div class="col-12 col-md-8">
                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-md-8">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-md-8">
                        <textarea rows="10" name="message" class="form-control" placeholder="Enter Your Comments"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-md-3">
                        <input type="submit" name="Submit" class="btn btn-success btn-block">
                    </div>
                </div>
            <form>
            <div class="media row py-3">
                <img src="./img/user.png" alt="User Photo" class="img-fluid rounded-circle mr-0" width="150" height="150">
                <div class="media-body">
                    <h4>Shailabh Suman</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</p>
                </div>
            </div>
            <div class="media row py-3">
                <img src="./img/user.png" alt="User Photo" class="img-fluid rounded-circle mr-0" width="150" height="150">
                <div class="media-body">
                    <h4>Roushan Suman</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</p>
                </div>
            </div>
        </div>
    </div>

<?php
    include './common/footer.php'
?>