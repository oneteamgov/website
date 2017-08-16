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

					<article class="c-page-section c-page-section--blog-listing">

					<?php

							// defaults for all modes
							$posts_per_page = 10;
							$template 		= 'post_in_list_alt.html';
							$sort_order		= 'DESC';
							$sort_by		= 'postDateTime';
							$archiveTitle = 'Archive';

							// Have we displayed any posts yet?
							$posts_displayed = false;

							/*
								perch_get() is used to get options from the URL.

						e.g. for the URL
							/blog/archive.php?cat=news

						perch_get('cat') would return 'news' because cat=news.


						The code below looks for different options in the URL, and then displays different types of listings based on it.
							*/


							/* --------------------------- POSTS BY CATEGORY --------------------------- */
							if (perch_get('cat')) {

								$archiveTitle = 'Archive of: '.perch_blog_category(perch_get('cat'), true).'';

								$archiveListing = perch_blog_custom([
									'category'   => perch_get('cat'),
									'template'   => $template,
									'count'      => $posts_per_page,
									'sort'       => $sort_by,
									'sort-order' => $sort_order,
									'skip-template' => true,
									'return-html' => true
								]);

									$posts_displayed = true;
							}


							/* --------------------------- POSTS BY TAG --------------------------- */
							if (perch_get('tag')) {

								$archiveTitle = 'Archive of: '.perch_blog_tag(perch_get('tag'), true).'';

								$archiveListing = perch_blog_custom([
									'tag'   	 => perch_get('tag'),
									'template'   => $template,
									'count'      => $posts_per_page,
									'sort'       => $sort_by,
									'sort-order' => $sort_order,
									'skip-template' => true,
									'return-html' => true
								]);

								$posts_displayed = true;

							}



							/* --------------------------- POSTS BY DATE RANGE --------------------------- */
							if (perch_get('year')) {

								$year              = intval(perch_get('year'));
								$date_from         = $year.'-01-01 00:00:00';
								$date_to           = $year.'-12-31 23:59:59';
								$title_date_format = '%Y';

									// Month and Year?
								if (perch_get('month')) {
									$month             = intval(perch_get('month'));
									$date_from         = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-01 00:00:00';
									$date_to           = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-31 23:59:59';
									$title_date_format = '%B, %Y';
								}

								$archiveTitle = 'Archive of: '.strftime($title_date_format, strtotime($date_from)).'';

								$archiveListing = perch_blog_custom([
									'filter'     => 'postDateTime',
									'match'      => 'eqbetween',
									'value'      => $date_from.','.$date_to,
									'template'   => $template,
									'count'      => $posts_per_page,
									'sort'       => $sort_by,
									'sort-order' => $sort_order,
									'skip-template' => true,
									'return-html' => true
								]);

									$posts_displayed = true;
							}



							/* --------------------------- POSTS BY AUTHOR --------------------------- */
							if (perch_get('author')) {

								$archiveTitle = 'Posts by '.perch_blog_author(perch_get('author'), ['template' => 'author_name.html',], true).'';

								$archiveListing = perch_blog_custom([
									'author'   	 => perch_get('author'),
									'template'   => $template,
									'count'      => $posts_per_page,
									'sort'       => $sort_by,
									'sort-order' => $sort_order,
									'skip-template' => true,
									'return-html' => true
								]);

									$posts_displayed = true;
							}


							/* --------------------------- DEFAULT: ALL POSTS --------------------------- */

							if ($posts_displayed == false) {

								// No other options have been used; no posts have been displayed yet.
								// So display all posts.

								$archiveTitle = 'Archive';

								$archiveListing = perch_blog_custom([
									'template'   => $template,
									'count'      => $posts_per_page,
									'sort'       => $sort_by,
									'sort-order' => $sort_order,
									'skip-template' => true,
									'return-html' => true
								]);

							}

					?>

				  <header class="c-page-section__header">
				    <h1 class="c-page-section__heading"><?php echo $archiveTitle; ?></h1>
				  </header>

					<?php echo $archiveListing['html'] ?>

				</article>

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
                  'show' => false
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
