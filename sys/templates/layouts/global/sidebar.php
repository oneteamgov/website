<?php
  $sidebar_config = perch_layout_var('config',true);
  $reading_config = $sidebar_config['reading_links'];
  $social_config = $sidebar_config['social'];
  $subnav_config = $sidebar_config['subnav'];
  $blog_config = $sidebar_config['blog'];
  $author_details = $sidebar_config['blog']['author_details']['data'];
?>

<div class="c-global-sidebar">

  <div class="c-global-sidebar__inner">

    <?php
      if($subnav_config['show']) {
        perch_pages_navigation(array(
          'from-path'  => '*',
          'from-level' => 1,
          'include-parent' => $subnav_config['show_parent'],
          'flat' => $subnav_config['flat']
        ));
      }
    ?>

    <?php if (isset($blog_config['show'])) : ?>

      <?php if (isset($blog_config['archives']) && $blog_config['archives']['show']) : ?>

      <article class="c-global-sidebar__section">
        <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-book"></use></svg> Archives</h3>
        <div class="c-global-sidebar__section-body">

          <!--  By year and then month - can take parameters for two templates. The first displays the years and the second the months see the default templates for examples -->
          <?php perch_blog_date_archive_months(); ?>

        </div>
      </article>

      <?php endif ?>

      <?php if (isset($blog_config['post_details']) && $blog_config['post_details']['show']) : ?>

        <article class="c-global-sidebar__section">
          <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-info"></use></svg> Post details</h3>
          <div class="c-global-sidebar__section-body">

            <dl class="c-dl c-dl--post-details">
              <dt class="c-dl__key">Published:</dt>
              <dd class="c-dl__val"><time datetime="<?php echo perch_blog_post_field(perch_get('s'), 'postDateTime') ?>"><?php echo strftime('%d %B %Y', strtotime(perch_blog_post_field(perch_get('s'), 'postDateTime', true))); ?></time></dd>
              <dt class="c-dl__key">Author:</dt>
              <dd class="c-dl__val"><a href="/blog/author/<?php echo $author_details['authorSlug'] ?>/"><?php echo $author_details['authorGivenName'] . ' ' . $author_details['authorFamilyName'] ?></a></dd>
            </dl>

            <?php perch_blog_post_tags(perch_get('s'), array(
                'template' => 'post_tags_list.html'
            )); ?>
          </div>
        </article>

      <?php endif ?>

      <?php if (isset($blog_config['nav']) && $blog_config['nav']['show']) : ?>

        <!-- The following functions are different ways to display archives. You can use any or all of these.

        All of these functions can take a parameter of a template to overwrite the default template, for example:

        perch_blog_categories('my_template.html');

        -->
        <!--  By tag -->
        <?php perch_blog_tags(); ?>
        <!--  By year -->
        <?php perch_blog_date_archive_months(); ?>

      <?php endif ?>

    <?php endif ?>

    <?php
      // READING LIST ###########################################################
      if($reading_config['show'] == 'true') :
      // ########################################################################
    ?>
    <article class="c-global-sidebar__section">
      <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-open-book"></use></svg> Reading list</h3>
      <div class="c-global-sidebar__section-body">
        <?php
          perch_collection('Reading list', [
            'count' => ($reading_config['total'] ? $reading_config['total'] : 5),
            'sort'  => (isset($reading_config['sort']) ? $reading_config['sort'] : '_date'),
            'sort-order' => (isset($reading_config['sort-order']) ? $reading_config['sort-order'] : 'DESC'),
          ]);
        ?>
      </div>
      <div class="c-global-sidebar__section-footer">
        <p><a href="/readinglist/" class="c-link c-link--cta">View the full reading list<svg class="icon icon-small-arrow--r"><use xlink:href="#icon-small-arrow--r"></use></svg></a></p>
      </div>
    </article>
    <?php endif; ?>

    <?php
      // SOCIAL LINKS LIST ######################################################
      if($social_config['show']) :
      // ########################################################################
    ?>
    <article class="c-global-sidebar__section">
      <h3 class="c-global-sidebar__heading"><svg class="o-icon"><use xlink:href="#icon-chat"></use></svg> Get involved</h3>
      <div class="c-global-sidebar__section-body">

        <ul class="c-cta-list c-cta-list--social">
          <li class="c-cta-list__item">
            <a href="/" class="c-cta c-cta--social c-cta--slack">
              <div class="c-cta__media"><img src="/public/images/slack.svg" alt=""></div><div class="c-cta__desc">Join us on slack</div>
            </a>
          </li>
          <li class="c-cta-list__item">
            <a href="https://twitter.com/OneTeamGov" class="c-cta c-cta--social c-cta--twitter">
              <div class="c-cta__media"><img src="/public/images/twitter.svg" alt=""></div><div class="c-cta__desc">Follow @oneteamgov</div>
            </a>
          </li>
        </ul>

      </div>
    </article>
    <?php endif; ?>

  </div>

</div>
