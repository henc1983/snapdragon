"use strict";

(function () {
  return {
    window: Object.assign(window, {
      preLoader: document.getElementById('snapdragon-site-preloader'),
      mediaQueryForm: document.forms['snapdragon-device-screen-form'],
      handleMediaQueryForm: function handleMediaQueryForm() {
        var formInput = mediaQueryForm.querySelector('input[name="snapdragon-device-screen"]');
        var screen = window.innerWidth < 1196 && window.innerWidth > 576 ? 'tablet' : window.innerWidth < 575.9 ? 'mobile' : 'desktop';
        if (formInput.value !== screen) {
          formInput.value = screen;
          mediaQueryForm.submit();
        }
      },
      resizeEvent: addEventListener('resize', function () {
        return window.handleMediaQueryForm();
      })
    }),
    document: Object.assign(document, {
      domReady: addEventListener('DOMContentLoaded', function () {
        preLoader.classList.replace('show', 'hide');
      })
    })
  };
})();
//# sourceMappingURL=main.js.map
