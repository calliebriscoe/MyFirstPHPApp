<DOCTYPE html>
    <?php
if($_SERVER['REQUEST_URI'] == '/navbar.php') {
    header('location: /index.php');
};
?>

    <head>

        <link href="/style.css" rel="stylesheet" type="text/css">
    </head>
<body>
<ul class="navbar">
    <li><a href="/">Home</a></li>
    <li><a href="/about.php">About Us</a></li>
    <li><a href="/photos.php">Photo Gallery</a></li>
    <li><a href="/contact.php">Contact Us</a></li>
</ul>
</body>
</DOCTYPE>