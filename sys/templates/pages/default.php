<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php perch_pages_title(); ?></title>
	<?php perch_page_attributes(); ?>
  <?php perch_layout('global/head'); ?>
</head>
<body>

<?php perch_layout('global/header'); ?>

    <h1><?php perch_content('Main heading'); ?></h1>

    <?php
    	perch_pages_navigation([
    		'levels' => 1,
    	]);
    ?>

    <?php perch_content('Intro'); ?>
<?php perch_layout('global/footer'); ?>
</body>
</html>
