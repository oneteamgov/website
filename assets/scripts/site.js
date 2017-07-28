// import libs and polyfills
import WebFont from 'webfontloader'
import scrollIt from './vendor/scrollIt.js'
import './vendor/polyfills.js'

var otg = {}

otg.settings = {
  webfont: {
    google: {
      families: ['Roboto:300,700']
    }
  }
}

otg.webFonts = function webFonts() {
  if(WebFont) {
    WebFont.load(otg.settings.webfont)
  }
}

/**
 * handles the scrollIt feature of links
 */
otg.scrollTo = function scrollTo() {
  let scrollLinks = document.querySelectorAll('.js-scrollTrigger');
  [].forEach.call(scrollLinks, function (link) {
    link.addEventListener('click', () => {
      scrollIt(
        document.querySelector(link.getAttribute('href')),
        450,
        'easeOutQuad'
      );
    });
  });
}

otg.ready = function ready() {
  this.scrollTo()
  this.webFonts()
}

otg.ready();
