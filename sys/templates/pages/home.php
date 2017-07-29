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

          <article class="c-page-section" id="intro">
            <header class="c-page-section__header">
              <h2 class="c-page-section__heading"><?php perch_content('Blog section title'); ?></h2>
            </header>
            <div class="c-page-section__body">

            </div>
            <footer class="c-page-section__footer">

            </footer>
          </article>

        </div>

          <div class="o-layout__item u-1/1 u-1/3@large">

            <div class="c-global-sidebar">

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae quo sunt odio molestiae, neque cumque praesentium? Autem perferendis, iusto sunt libero veritatis consectetur nesciunt est beatae! Consectetur, itaque illo odio.</p>

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
