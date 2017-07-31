<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<title><?php perch_pages_title(); ?></title>
	<?php perch_page_attributes(); ?>
  <?php perch_layout('global/head'); ?>
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
                  'count' => 5
                ));
              ?>

            </div>
            <footer class="c-page-section__footer">

            </footer>
          </article>

        </div>

          <div class="o-layout__item u-1/1 u-1/3@large">

            <div class="c-global-sidebar">

              <div class="c-global-sidebar__inner">

                <article class="c-global-sidebar__section">
                  <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-open-book"></use></svg> Reading list</h3>
                  <div class="c-global-sidebar__section-body">
                    <?php
                      perch_collection('Reading list', [
                          'count' => 5,
                          'sort'  => '_date',
                          'sort-order' => 'DESC',
                      ]);
                    ?>
                  </div>
                  <div class="c-global-sidebar__section-footer">
                    <p><a href="/readinglist/" class="c-link c-link--cta">View the full reading list<svg class="icon icon-small-arrow--r"><use xlink:href="#icon-small-arrow--r"></use></svg></a></p>
                  </div>
                </article>

                <article class="c-global-sidebar__section">
                  <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-chat"></use></svg> Get involved</h3>
                  <div class="c-global-sidebar__section-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </article>

              </div>

            </div>

          </div>

      </div>

    </div>

  </main>

  <!-- <?php
  perch_pages_navigation([
  'levels' => 1,
  ]);
  ?> -->

<?php perch_layout('global/footer'); ?>

</body>
</html>
