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

  <?php perch_layout('global/header',[
    'hide_nav' => false
  ]); ?>

  <main id="content">

    <div class="c-document-heading">
      <div class="o-contain">
        <h1 class="c-document-heading__title"><?php perch_pages_title() ?></h1>
      </div>
    </div>

    <div class="o-contain">

      <div class="o-layout o-layout--huge">

        <div class="o-layout__item u-1/1 u-2/3@large">

					<?php perch_blog_authors(); ?>

        </div>

        <?php if ($page_attributes['layout_sidebar'] == 'true') : ?>
        <div class="o-layout__item u-1/1 u-1/3@large">

          <?php perch_layout('global/sidebar', [
        		'config' => [
              'reading_links' => [
                'show' => $page_attributes['layout_sidebar_reading'],
                'total' => $page_attributes['layout_sidebar_reading_count']
              ],
              'social' => [
                'show' => true
              ],
              'blog' => [
                'show' => true,
                'archives' => [
                  'show' => true
                ],
                'post_details' => [
                  'show' => false
                ],
                'nav' => [
                  'show' => false
                ]
              ],
              'subnav' => [
                'show' => false,
                'show_parent' => true,
                'flat' => true
              ]
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
