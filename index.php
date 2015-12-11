<head>


</head>

<?php
# Step 7
include('functions.php');

    if (!file_exists('articles.file')) {
    $blank_data = serialize(array());
    file_put_contents('articles.file',$blank_data);
};

if(count($_POST) > 0) {
    if(isset($_POST['edited'])) {
        $id = $_POST['edited'];
        $pos = findArticlePosById($articles, $id);

        $editedArticle = $_POST;
        unset($editedArticle['edited']);
        $articles[$pos] = $editedArticle;

    } else {
   /* elseif($postvar == '') {exit("Did not finish your work!");} */

$articles[] = $_POST;
saveArticles($articles);
}; };


# start of HTML
?>
<DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <link href="/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>My Blog</h1><?php if(count($articles) > 0) { ?>
<h2>List of Articles</h2>

<div>
    <ul>
        <?php foreach($articles as $article){?>
        <li><a href="#<?php echo get_article_id($article); ?>"><?php echo $article['title'] ?></a></li>
    <?php } ?>
    </ul>
</div>
<div><?php };
    foreach ($articles as $article1) {
        echoArticle($article1); } ?> </div>

    <div>
        <form action="/" id="article-form" method="POST">
            <h2>Write a new blog:</h2>
            <div class="form_field">
                <label for="title">Title</label><br>
                <input name="title">
            </div>
            <div class="form_field" id="name_date_field">
                <div>
                    <label for="author">Author</label><br>
                    <input name="author">
                </div>
                <div>
                    <label for="date">Date</label><br>
                    <input name="date">
                </div>
            </div>
            <div class="form_field">
                <label for="content">Content</label><br>
                <textarea name="content"></textarea>
            </div>
            <div class="form_field">
                <input type="submit" value="Publish!">
            </div>
        </form>
    </div>
</body>
</html>
</DOCTYPE html>