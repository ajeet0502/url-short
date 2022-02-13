<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Url Short</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php 
        include 'lib/db.php';
        include 'lib/helper.php';
    ?>
    <div id="wrapper">
        <h1>Create Short URL Using PHP<br></h1>
        <p class="form_head">Enter URL To Create Short URL</p>
        <form method="post" class="url_form">
            <input type="text" name="url_value" placeholder="Enter URL">
            <input type="submit" name="short_url">
        </form>
        <?php 
            if(isset($_POST['short_url']))
            {
                $url=htmlspecialchars($_POST["url_value"]);
                $result=shortUrl($url,$conn);
                echo "<p class='form_head'>Your Short URL Is : ".$result."</p>";
            }
        ?>
        <p class="form_head">Enter Short URL To Get Original URL</p>
        <form method="post" class="url_form">
            <input type="text" name="short_url_value" placeholder="Enter Short URL">
            <input type="submit" name="original_url">
        </form>
        <?php 
            if(isset($_POST['original_url']))
            {
                $url=htmlspecialchars($_POST["short_url_value"]);
                $result=longUrl($url,$conn);
                echo "<p class='form_head'>Your Full URL Is : ".$result."</p>";
            }
        ?>
        <p class="form_head">Short URL View</p>
        <form method="post" class="url_form">
            <input type="text" name="short_url_value" placeholder="Enter Short URL">
            <input type="submit" name="count">
        </form>
        <?php 
            if(isset($_POST['count']))
            {
                $url=htmlspecialchars($_POST["short_url_value"]);
                $result=viewCountUrl($url,$conn);
                echo "<p class='form_head'>View count : ".$result."</p>";
            }
        ?>
    </div>

</body>
</html>
