<?php
function init_db()
{
    $db = mysqli_connect('localhost', 'root', 'root');
    mysqli_select_db($db, 'acashop');
};
function load_articles_from_db() {
    $result = mysqli_query($db, 'SELECT * FROM aca_article;');

    $rows = array();

    while ($rows[] = mysqli_fetch_assoc($result)) {}
    return $rows;
};


?>