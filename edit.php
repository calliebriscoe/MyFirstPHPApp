<script>
    function areYouSure(link)
    {result = confirm('Are you sure?');
        if(result) {
            document.location = link;
        }}
</script>

<html>

  <?php include('functions.php');

    $articles= loadArticles();
    $articleId = $_GET['id'];

    $article= findArticleById($articles, $articleId);
    $title = $article['title'];
    $author = $article['author'];
    $date = $article['date'];
    $content = $article['content'];
    $id = get_article_id($article);


  if(isset($_GET['die'])) {
      $id = $_GET['die'];
      $position = findArticlePosById($articles, $id);


      if(!is_null($pos)) {
      unset($articles[$position]); }
  }
      saveArticles($articles);

      echo "This article has been deleted!";
  };
    ?>
    <body>
    <div>
        <form action="/" id="article-form" method="POST">
            <h2>Edit Article:</h2>
            <div class="form_field">
                <label for="title">Title</label><br>
                <input name="title" value="<?php echo $title?>">
            </div>
            <div class="form_field" id="name_date_field">
                <div>
                    <label for="author">Author</label><br>
                    <input name="author" value="<?php echo $author?>">
                </div>
                <div>
                    <label for="date">Date</label><br>
                    <input name="date" value="<?php echo $date?>">
                </div>
            </div>
            <div class="form_field">
                <label for="content">Content</label><br>
                <textarea name="content"><?php echo $content?></textarea>
            </div>
            <div class="form_field">
                <input type="submit" value="Publish!">
            </div>
            <div class="form_field">
                <input type="hidden" name="edited" value="<?php echo $id ?>">
            </div>
        </form>
    </div>
    <div><a onclick="areYouSure('/?die=<?php echo $id;?>')">Delete this Article.</a></div>
    <div><a href="/">Return to the main page.</a></div>
    </body>
    </html>
