<?php
// Set the timezone
ini_set('date.timezone', 'Europe/Brussels');

// Load our dataset with text, fat-food and CSS styles
require_once('dataset.php');

// Pick a "random" value per day. To do so, set PHP's rand() seed
// to the current day, so today will always get the same "random" value.
// Unless debug mode is enabled
if (!isset($_GET['DEBUG_RANDOM_EVERY_TIME']))
  srand(mktime(0, 0, 0));

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
  <link href="assets/css/vettigevrijdag.css" rel="stylesheet" media="screen">

</head>
<body>

  <!-- Home start -->

  <section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
    <div class="intro">
      <div class="start normaltext"><?= $text_intro1 ?></div>
      <h1><?= $text_middle ?></h1>
      <div class="start normaltext"><?= $text_intro2 ?></div>
    </div>
  </section>

  <!-- Home end -->

  <!-- Navigation start -->

</body>
</html>