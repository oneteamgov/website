<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<title><?php perch_pages_title(); ?></title>
	<?php perch_page_attributes(); ?>
  <link rel="stylesheet" href="/public/styles/site.min.css">
</head>
<body>
    <h1><?php perch_content('Main heading'); ?></h1>

    <?php
    	perch_pages_navigation([
    		'levels' => 1,
    	]);
    ?>

    <?php perch_content('Intro'); ?>
</body>
</html>
