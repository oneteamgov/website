<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php perch_layout('global/head', [
    'title' => perch_pages_title(true) . ' &ndash; One Team Government'
  ]); ?>
</head>
<body>

  <?php perch_layout('global/header',[
    'hide_nav' => false
  ]); ?>

  <?php
    $showSidebar = perch_page_attribute('layout_sidebar',[],true);
    $showReadingList = perch_page_attribute('layout_sidebar_reading',[], true);
  ?>

  <main id="content">

    <div class="c-document-heading">
      <div class="o-contain">
        <h1 class="c-document-heading__title"><?php perch_pages_title() ?></h1>
      </div>
    </div>

    <div class="o-contain">

      <div class="o-layout o-layout--huge">

        <div class="o-layout__item u-1/1 u-2/3@large">
          <?php perch_content('page_content') ?>
        </div>

        <?php if ($showSidebar == 'true') : ?>
        <div class="o-layout__item u-1/1 u-1/3@large">

          <?php perch_layout('global/sidebar', [
        		'config' => [
              'reading_links' => [
                'show' => $showReadingList,
                'total' => 3
              ],
              'social' => [
                'show' => true
              ],
              'subnav' => [
                'show' => true,
                'show_parent' => true,
                'flat' => true
              ],
              'blog' => false
            ]
          ]); ?>

        </div>
        <?php endif; ?>

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
