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

          <?php perch_content('content') ?>

          <perch:form id="contact" method="post" app="perch_forms">

              <perch:content id="intro" type="textarea" label="Intro" textile="true" editor="markitup" size="m" />

              <div>
                  <perch:label for="name">Name</perch:label>
                  <perch:input type="text" id="name" required="true" label="Name" />
                  <perch:error for="name" type="required">Please add your name</perch:error>
              </div>

              <div>
                  <perch:label for="email">Email</perch:label>
                  <perch:input type="email" id="email" required="true" label="Email" placeholder="you@company.com" />
                  <perch:error for="email" type="required">Please add your email address</perch:error>
                  <perch:error for="email" type="format">Please check your email address</perch:error>
              </div>

              <div>
                  <perch:label for="message">Message</perch:label>
                  <perch:input type="textarea" id="message" required="true" label="Message" />
                  <perch:error for="message" type="required">Please add a message</perch:error>
              </div>

              <div>
                  <perch:input type="submit" id="submit" value="Send" />
              </div>

              <perch:success>
                  <perch:content id="success" type="textarea" label="Thank you message" textile="true" editor="markitup" />
              </perch:success>
          </perch:form>

        </div>

        <?php if ($page_attributes['layout_sidebar'] == 'true') : ?>
        <div class="o-layout__item u-1/1 u-1/3@large">

          <?php perch_layout('global/sidebar', [
        		'config' => [
              'reading_links' => [
                'show' => ($page_attributes['layout_sidebar_reading'] ? $page_attributes['layout_sidebar_reading'] : false ),
                'total' => $page_attributes['layout_sidebar_reading_count']
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
