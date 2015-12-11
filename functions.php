<head>
    <title>Blog</title>
    <link href="/style.css" rel="stylesheet" type="text/css">

</head>
<body><?php

function get_article_id($article) {
$id = str_replace(' ','_',$article['title']);
return $id;
};

function echoArticle($article) {
$title = $article['title'];
$author = $article['author'];
$date = $article['date'];
$content = nl2br($article['content']);
$id = get_article_id($article);
?>
<div class="article" id="<?php echo $id;?>">
    <h2><?php echo $title; ?></h2>
    <p class="byline">
        by <span class="author"><?php echo $author; ?></span>
        on <span class="date"><?php echo $date; ?></span>
    </p>
    <div class="content"><?php echo $content; ?>
    </div>
    <div><a href="/edit.php?id=<?php echo $id;?>">Edit this Article.</a></div>
</div><?php
};

# now $articles is an array of arrays: an array of each $article
# it can still be serialized and saved just the same way
function saveArticles($articles, $filename='articles.file') {
    $data = serialize($articles);
    file_put_contents($filename, $data);
};

function loadArticles() {
    $data = file_get_contents($filename='articles.file');
    return unserialize($data);
};

# $articles = loadArticles();


function findArticleById($articles, $id) {
    foreach ($articles as $article) {
        $thisId = get_article_id($article);
        if ($thisId == $id)
            return $article;
    };
};


function findArticlePosById($articles, $id) {
    foreach ($articles as $pos => $article) {
        $thisId = get_article_id($article);
        if ($thisId == $id) {
            return $pos;
        };
    }
};

$db = NULL;

function init_db()
{
    $db = mysqli_connect('localhost', 'root', 'root');
    mysqli_select_db($db, 'acashop');
    return $db;
};
 $db = init_db();


function load_articles_from_db($db) {

    $result = mysqli_query($db, 'SELECT * FROM aca_article');
    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
    }
    return $rows;
};

 $articles = load_articles_from_db($db);
# print_r($articles);


function create_article_to_db($db, $article) {
    $title = $article['title'];
    $author = $article['author'];
    $date = $article['date'];
    $content = nl2br($article['content']) ;

    mysqli_query($db, "
    INSERT INTO aca_article (title, author, date, content)

    ");
}

/*$articles = array(
    array(
        'title' => 'My Blog Article',
        'author' => 'Ryan',
        'date' => 'Mar 10, 2015',
        'content' => '<p>This is my first blog article so I\'m a little nervous. Blogs seem really good and hopefully there will be more to come. Ok, here goes...</p>'
    ),
    array(
        'title' => 'Other Blog Article',
        'author' => 'Mark',
        'date' => 'Mar 12, 2015',
        'content' => '<p>SxSW is here. Ughhhh..... I mean YEAH!!! Good for the economy! Bad for traffic...</p>'
    ),
    array(
        'title' => 'Went Camping',
        'author' => 'Other Author',
        'date' => 'Mar 13, 2015',
        'content' => 'I went camping and got chased by a bear.'
    )
);

saveArticles($articles); */

?>
</body>