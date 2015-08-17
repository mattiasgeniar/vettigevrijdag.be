<?php
// Set the timezone
ini_set('date.timezone', 'Europe/Brussels');

// Load our dataset with text, fat-food and CSS styles
require_once('dataset.php');

// Pick a "random" value per day. To do so, set PHP's rand() seed
// to the current day, so today will always get the same "random" value.
// Unless debug mode is enabled
if (!isset($_GET['DEBUG_RANDOM_EVERY_TIME']))
  srand(mktime(0, 0, 0, date("n"), date("j"), date("Y")));

// Is it friday?
if (strtolower(date('l')) == 'friday' || isset($_GET['DEBUG_FAKE_FRIDAY'])) {
  // Yup, friday (or debug mode), pick a random one from the array
  $data_array = $fatfoods;
} else {
  // Not friday, show some vegetables
  $data_array = $vegetables;
}

$page_content = $data_array[rand(0, count($data_array)-1)];

// Set some variables used below (CSS style & text)
$background_img = $page_content['img'];
$text_intro1    = $page_content['intro1'];
$text_middle    = $page_content['middle'];
$text_intro2    = $page_content['intro2'];
?>
<!DOCTYPE html>
<html lang="en" class="background" style="background: url('<?= $background_img ?>') no-repeat center center fixed;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mattias Geniar">

  <title>VettigeVrijdag.be</title>

  <!-- CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

  <!-- Custom styles CSS -->
  <link href="assets/css/style.css" rel="stylesheet" media="screen">

  <!-- Vettige Vrijdag CSS -->
  <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
  <link href="assets/css/vettigevrijdag.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" type="image/png" href="/favicon.png"/>

  <!-- Twitter Cards meta tags -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:site"        content="@mattiasgeniar">
  <meta name="twitter:creator"     content="@mattiasgeniar">
  <meta name="twitter:title"       content="En ... wat eten we vandaag?">
  <meta name="twitter:description" content="Tis vettige vrijdag. Benieuwd naar de vettige suggestie van de week?">
  <meta name="twitter:image"       content="http://vettigevrijdag.be<?= $background_img ?>">

  <!-- Facebook Open Graph meta tags -->
  <meta property="og:title"       content="En ... wat eten we vandaag?" />
  <meta property="og:site_name"   content="Vettige Vrijdag"/>
  <meta property="og:url"         content="http://vettigevrijdag.be" />
  <meta property="og:description" content="Tis vettige vrijdag. Benieuwd naar de vettige suggestie van de week?" />
  <meta property="og:image"       content="http://vettigevrijdag.be<?= $background_img ?>" />
</head>
<body>
  <section id="home" class="pfblock-image screen-height">
    <div class="home-overlay"></div>
    <div class="intro">
      <div class="start normaltext"><?= $text_intro1 ?></div>
      <h1><?= $text_middle ?></h1>
      <div class="start normaltext"><?= $text_intro2 ?></div>
    </div>
  </section>

  <footer class=" navbar-fixed-bottom">
    <div class="container">
      <p class="footer_text">Dit is een website van <a href="https://ma.ttias.be" target="_blank">ma.ttias.be</a> - <a href="https://github.com/mattiasgeniar/vettigevrijdag.be" target="_blank">fork me</a>.</p>
    </div>
  </footer>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-66382018-1', 'auto');
    ga('send', 'pageview');

  </script>
</body>
</html>