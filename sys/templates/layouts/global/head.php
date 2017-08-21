<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title><?php perch_layout_var('title') ?></title>

<link rel="preload" href="/public/scripts/site.js" as="script">
<link rel="stylesheet" href="/public/styles/site.min.css">

<!-- favicon meta -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/public/images/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/images/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/images/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/images/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/public/images/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/public/images/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/public/images/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/public/images/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="/public/images/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="/public/images/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="/public/images/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="/public/images/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="/public/images/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="OneTeamGov"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="/public/images/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="/public/images/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="/public/images/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="/public/images/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="/public/images/favicon/mstile-310x310.png" />

<?php

  $domain        = 'http://'.$_SERVER["HTTP_HOST"];
  $url           = $domain.$_SERVER["REQUEST_URI"];
  $sitename      = perch_layout_var('sitename', true);
  $twittername   = "@oneteamgov";
  $sharing_image = '/public/images/tc.jpg';

  PerchSystem::set_var('domain',$domain);
  PerchSystem::set_var('url',$url);
  PerchSystem::set_var('sharing_image',$sharing_image);
  PerchSystem::set_var('twittername',$twittername);

  perch_page_attributes(array(
    'template' => 'default.html'
  ));
?>
