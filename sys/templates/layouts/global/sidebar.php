<?php
  $sidebar_config = perch_layout_var('config',true);
  $reading_config = $sidebar_config['reading_links'];
  $social_config = $sidebar_config['social'];
  $subnav_config = $sidebar_config['subnav'];
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
            'sort'  => ($reading_config['sort'] ? $reading_config['sort'] : '_date'),
            'sort-order' => ($reading_config['sort-order'] ? $reading_config['sort-order'] : 'DESC'),
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
