<?php
include("./include/header.php");

if (isset($_GET['post'])) {
    $post_id = $_GET['post'];

    $post = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $post->execute(['id' => $post_id]);
    $post = $post->fetch();
}

if (isset($_POST['post_comment'])) {

    if (trim($_POST['name']) != "" || trim($_POST['comment']) != "") {

        $name = $_POST['name'];
        $comment = $_POST['comment'];

        $comment_insert = $db->prepare("INSERT INTO comments (name, comment, post_id) VALUES (:name , :comment , :post_id)");
        $comment_insert->execute(['name' => $name, 'comment' => $comment, 'post_id' => $post_id]);

        header("Location:single.php?post=$post_id");
        exit();
    } else {
        echo "فیلد ها نباید خالی باشند";
    }
}
?>
<?php include("./include/footer.php")
?>