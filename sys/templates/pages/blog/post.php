<?php perch_blog_check_preview(); ?>

<?php

  $page_attributes = perch_page_attributes([
    'template' => 'layout.html',
    'skip-template' => 'true'
  ],true);

  $author_details = perch_blog_author_for_post(perch_get('s'), array(
      'template' => 'author_sidebar.html',
      'skip-template' => true
  ));

  # get the post
  $post = perch_blog_custom(array(
      'filter'        => 'postSlug',
      'match'         => 'eq',
      'value'         => perch_get('s'),
      'skip-template' => 'true',
      'return-html'   => 'true',
      'cache' => 'false'
    ));

  # set up the variables
  $postData      = $post['0'];
  $title         = $postData['postTitle'];
  $description   = strip_tags($postData['excerpt']);

  # use the variables in the array value
  perch_page_attributes_extend(array(
    'description'    => $description,
    'og_description' => $description,
    'og_title'       => $title,
    'og_type'        => 'article',
    'og_image'       => $postData['image'],
    'og_author'      => $author_details['authorGivenName'] . ' ' . $author_details['authorFamilyName'],
  ));

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php perch_layout('global/head', [
    'title' => $title . ' &ndash; ' . perch_pages_title(true) . ' &ndash; One Team Government'
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

          <?php echo $post['html']; ?>

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
              'subnav' => [
                'show' => false,
                'show_parent' => true,
                'flat' => true
              ],
							'blog' => [
								'show' => true,
                'author_details' => [
                  'show' => true,
                  'data' => $author_details
                ],
                'post_details' => [
                  'show' => true
                ],
                'nav' => [
                  'show' => false,
                  'show_date_archive' => true,
                  'show_cat' => true
                ],
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
