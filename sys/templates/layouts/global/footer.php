
<?php
  $footer_config = perch_layout_var('config', true);
?>

<footer class="c-global-footer">

  <div class="c-global-footer__bar">
    <div class="c-global-footer__inner">
      <div class="o-contain">
        <div class="c-global-footer__content">
          <div class="o-layout o-layout--bottom">
            <div class="o-layout__item u-1/2">
              <p><?php echo $footer_config['support']['label']; ?></p>
              <div class="o-layout o-layout--bottom c-supporters">
                <div class="o-layout__item u-1/2 u-1/6@medium">
                  <img src="/public/images/perch.png" alt="Perch runway">
                </div>
              </div>
            </div>
            <div class="o-layout__item u-1/2">
              <p class="u-tar"><img src="/public/images/divcharter.png" width="220" alt=""></p>
            </div>
          </div>
        </div>
        <div class="o-layout o-layout--bottom">
          <div class="o-layout__item u-1/3 u-1/4@large">
            <p><?php echo $footer_config['copyright']; ?></p>
          </div>
          <div class="o-layout__item u-2/3 u-3/4@large">
            <ul class="c-global-footer__list">
              <li class="c-global-footer__item">
                <a href="https://github.com/oneteamgov/website" class="c-global-footer__link"><svg class="o-icon c-global-footer__icon"><use xlink:href="#icon-github"></use></svg>Our code</a>
              </li>
              <li class="c-global-footer__item">
                <a href="http://twitter.com/oneteamgov" class="c-global-footer__link"><svg class="o-icon c-global-footer__icon"><use xlink:href="#icon-twitter"></use></svg>Follow us on Twitter</a>
              </li>
              <li class="c-global-footer__item">
                <a href="/about/code-of-conduct" class="c-global-footer__link"><svg class="o-icon c-global-footer__icon"><use xlink:href="#icon-open-book"></use></svg>Code of conduct</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>

<script src="/public/scripts/site.js"></script>
