<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php
    $page_attributes = perch_page_attributes([
      'template' => 'layout.html',
      'skip-template' => 'true'
    ],true);
  ?>
  <?php perch_layout('global/head', [
    'title' => perch_pages_title(true) . ' &ndash; One Team Government'
  ]); ?>
</head>
<body>

  <?php perch_layout('global/header'); ?>

  <div class="c-global-banner">
    <div class="c-global-banner__inner">
    </div>
  </div>

  <main id="content">

    <div class="o-contain">

      <div class="o-layout o-layout--huge">

        <div class="o-layout__item u-1/1 u-2/3@large">

          <article class="c-page-section" id="intro">
            <header class="c-page-section__header">
              <h2 class="c-page-section__heading"><?php perch_content('Intro title'); ?></h2>
            </header>
            <div class="c-page-section__body">
              <?php perch_content('Intro summary'); ?>
            </div>
            <footer class="c-page-section__footer">
              <?php perch_content('Intro call to action'); ?>
            </footer>
          </article>

          <article class="c-page-section" id="blog">
            <header class="c-page-section__header">
              <h2 class="c-page-section__heading"><?php perch_content('Blog section title'); ?></h2>
            </header>
            <div class="c-page-section__body">

              <?php
                perch_blog_custom(array(
                  'template' => 'blog/homepage_post_in_list.html',
                  'count' => 3,
                  'sort' => 'postDateTime',
                  'sort-order' => 'DESC'
                ));
              ?>

            </div>
            <footer class="c-page-section__footer">
              <?php perch_content('Blog call to action'); ?>
            </footer>
          </article>

        </div>

          <div class="o-layout__item u-1/1 u-1/3@large">

            <?php perch_layout('global/sidebar', [
          		'config' => [
                'reading_links' => [
                  'show' => $page_attributes['layout_sidebar_reading'],
                  'total' => $page_attributes['layout_sidebar_reading_count'],
                  'sort-order' => 'DESC'
                ],
                'social' => [
                  'show' => true
                ],
                'blog' => false,
                'subnav' => false
              ]
            ]); ?>

          </div>

      </div>

    </div>

  </main>

<?php perch_layout('global/footer', [
  'config' => [
    'copyright' => perch_content('copyright', true) . ' ' . date("Y"),
    'support' => [
      'label' => perch_content('support_label', true)
    ]
  ]
]); ?>

</body>
</html>
