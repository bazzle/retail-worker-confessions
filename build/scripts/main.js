(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

require("./modules/global_variables.js");

require("./modules/menu_trigger.js");

require("./modules/main_nav.js");

require("./modules/scroll_event.js");

},{"./modules/global_variables.js":2,"./modules/main_nav.js":3,"./modules/menu_trigger.js":4,"./modules/scroll_event.js":5}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.mq_small = void 0;
var mq_small = window.matchMedia("(max-width:560px)");
exports.mq_small = mq_small;

},{}],3:[function(require,module,exports){
"use strict";

var header = document.querySelector('header');
var menu = document.getElementById('menu-main');
var menuItems = menu.querySelectorAll('.header__menu__item');
menuItems.forEach(function (i) {
  var menuitem = i;
  var mainlink = i.querySelector('.header__menu__item__link');
  var dd = i.querySelector('.dropdown');
  menuitem.addEventListener('mouseenter', function () {
    menuitem.classList.add('link-active');
  });
  menuitem.addEventListener('mouseleave', function () {
    menuitem.classList.remove('link-active');
  });
});

},{}],4:[function(require,module,exports){
"use strict";

// menu trigger -------------------------------------------------
var triggermenu = document.querySelector('.trigger-menu');
var menu = document.querySelector('.mobile-menu');
var body = document.getElementsByTagName("BODY")[0];
var isopen = false;

var menu_open = function menu_open() {
  menu.setAttribute('aria-pressed', true);
  isopen = true;
  menu.classList.add('open');
  menu.classList.remove('close');
  body.classList.add('locked');
};

var menu_close = function menu_close() {
  menu.setAttribute('aria-pressed', false);
  isopen = false;
  menu.classList.add('close');
  menu.classList.remove('open');
  body.classList.remove('locked');
};

triggermenu.addEventListener('click', function () {
  isopen ? menu_close() : menu_open();
});
triggermenu.addEventListener('keyup', function (e) {
  if (e.key == 'Escape' && isopen == true) {
    menu_close();
  }
});

},{}],5:[function(require,module,exports){
"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var sb = _interopRequireWildcard(require("./scroll_progress_indicator.js"));

var gv = _interopRequireWildcard(require("./global_variables.js"));

function _getRequireWildcardCache() { if (typeof WeakMap !== "function") return null; var cache = new WeakMap(); _getRequireWildcardCache = function _getRequireWildcardCache() { return cache; }; return cache; }

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } if (obj === null || _typeof(obj) !== "object" && typeof obj !== "function") { return { "default": obj }; } var cache = _getRequireWildcardCache(); if (cache && cache.has(obj)) { return cache.get(obj); } var newObj = {}; var hasPropertyDescriptor = Object.defineProperty && Object.getOwnPropertyDescriptor; for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) { var desc = hasPropertyDescriptor ? Object.getOwnPropertyDescriptor(obj, key) : null; if (desc && (desc.get || desc.set)) { Object.defineProperty(newObj, key, desc); } else { newObj[key] = obj[key]; } } } newObj["default"] = obj; if (cache) { cache.set(obj, newObj); } return newObj; }

// scroll event ---------------------------------------------
var backtop = document.querySelector('.backtop');
var backtopinner = document.querySelector('.backtop__inner');
var contentstart = document.querySelector('main');
var contentoffset = contentstart.getBoundingClientRect().top + pageYOffset;
var header = document.querySelector('.header');
var allelems = [sb.progress_indicator, backtop];
var body = document.querySelector('body');
var scrolldelay;
var isitdown;

var backtopfunc = function backtopfunc() {
  if (isitdown) {
    fadein();
    isitdown = false;
  }

  clearTimeout(scrolldelay);
  scrolldelay = setTimeout(function () {
    fadeout();
    isitdown = true;
  }, 1500);
};

var fadeout = function fadeout() {
  backtopinner.classList.add('fadeout');
  backtopinner.classList.remove('fadein');
};

var fadein = function fadein() {
  backtopinner.classList.remove('fadeout');
  backtopinner.classList.add('fadein');
};

var hideshow = function hideshow() {
  window.onscroll = function () {
    if (body.classList.contains('single')) {
      sb.scrollbar();
    }

    if (window.pageYOffset < contentoffset) {
      if (body.classList.contains('single')) {
        allelems.forEach(function (e) {
          e.classList.remove('visible');
          e.classList.add('hidden');
        });
      }

      header.classList.remove('header--shallow');
    } else {
      if (body.classList.contains('single')) {
        allelems.forEach(function (e) {
          e.classList.add('visible');
          e.classList.remove('hidden');
        });
      }

      header.classList.add('header--shallow');
    }

    if (gv.mq_small.matches) {
      backtopfunc();
    }
  };
};

hideshow();

},{"./global_variables.js":2,"./scroll_progress_indicator.js":6}],6:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.scrollbar = exports.progress_indicator = void 0;
// scrollbar progress indicator -----------------------------
var progress_indicator = document.querySelector('.progress-indicator');
exports.progress_indicator = progress_indicator;

var scrollbar = function scrollbar() {
  var displayheight = window.innerHeight;
  var pillarcontent = document.querySelector('.article');
  var bodyheight = document.body.clientHeight;
  var pillarcontentheight = pillarcontent.clientHeight;
  var pillarcontentoffset = pillarcontent.offsetTop;
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var winScroll_new = winScroll - pillarcontentoffset;
  var windScroll_new_bottom = winScroll_new + window.innerHeight;
  var scrolledpc = windScroll_new_bottom / pillarcontentheight * 100;
  document.getElementById("myBar").style.width = scrolledpc + "%";
};

exports.scrollbar = scrollbar;

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJhc3NldHMvc2NyaXB0cy9tYWluLmpzIiwiYXNzZXRzL3NjcmlwdHMvbW9kdWxlcy9nbG9iYWxfdmFyaWFibGVzLmpzIiwiYXNzZXRzL3NjcmlwdHMvbW9kdWxlcy9tYWluX25hdi5qcyIsImFzc2V0cy9zY3JpcHRzL21vZHVsZXMvbWVudV90cmlnZ2VyLmpzIiwiYXNzZXRzL3NjcmlwdHMvbW9kdWxlcy9zY3JvbGxfZXZlbnQuanMiLCJhc3NldHMvc2NyaXB0cy9tb2R1bGVzL3Njcm9sbF9wcm9ncmVzc19pbmRpY2F0b3IuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7OztBQ0FBOztBQUNBOztBQUNBOztBQUNBOzs7Ozs7Ozs7QUNITyxJQUFNLFFBQVEsR0FBRyxNQUFNLENBQUMsVUFBUCxDQUFrQixtQkFBbEIsQ0FBakI7Ozs7OztBQ0FQLElBQU0sTUFBTSxHQUFHLFFBQVEsQ0FBQyxhQUFULENBQXVCLFFBQXZCLENBQWY7QUFDQSxJQUFNLElBQUksR0FBRyxRQUFRLENBQUMsY0FBVCxDQUF3QixXQUF4QixDQUFiO0FBQ0EsSUFBTSxTQUFTLEdBQUcsSUFBSSxDQUFDLGdCQUFMLENBQXNCLHFCQUF0QixDQUFsQjtBQUNBLFNBQVMsQ0FBQyxPQUFWLENBQW1CLFVBQUMsQ0FBRCxFQUFPO0FBQ3RCLE1BQUksUUFBUSxHQUFHLENBQWY7QUFDQSxNQUFJLFFBQVEsR0FBRyxDQUFDLENBQUMsYUFBRixDQUFnQiwyQkFBaEIsQ0FBZjtBQUNBLE1BQUksRUFBRSxHQUFHLENBQUMsQ0FBQyxhQUFGLENBQWdCLFdBQWhCLENBQVQ7QUFDQSxFQUFBLFFBQVEsQ0FBQyxnQkFBVCxDQUEwQixZQUExQixFQUF1QyxZQUFNO0FBQ3pDLElBQUEsUUFBUSxDQUFDLFNBQVQsQ0FBbUIsR0FBbkIsQ0FBdUIsYUFBdkI7QUFDSCxHQUZEO0FBR0EsRUFB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c0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gcihlLG4sdCl7ZnVuY3Rpb24gbyhpLGYpe2lmKCFuW2ldKXtpZighZVtpXSl7dmFyIGM9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZTtpZighZiYmYylyZXR1cm4gYyhpLCEwKTtpZih1KXJldHVybiB1KGksITApO3ZhciBhPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIraStcIidcIik7dGhyb3cgYS5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGF9dmFyIHA9bltpXT17ZXhwb3J0czp7fX07ZVtpXVswXS5jYWxsKHAuZXhwb3J0cyxmdW5jdGlvbihyKXt2YXIgbj1lW2ldWzFdW3JdO3JldHVybiBvKG58fHIpfSxwLHAuZXhwb3J0cyxyLGUsbix0KX1yZXR1cm4gbltpXS5leHBvcnRzfWZvcih2YXIgdT1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlLGk9MDtpPHQubGVuZ3RoO2krKylvKHRbaV0pO3JldHVybiBvfXJldHVybiByfSkoKSIsImltcG9ydCAnLi9tb2R1bGVzL2dsb2JhbF92YXJpYWJsZXMuanMnO1xuaW1wb3J0ICcuL21vZHVsZXMvbWVudV90cmlnZ2VyLmpzJztcbmltcG9ydCAnLi9tb2R1bGVzL21haW5fbmF2LmpzJztcbmltcG9ydCAnLi9tb2R1bGVzL3Njcm9sbF9ldmVudC5qcyc7IiwiZXhwb3J0IGNvbnN0IG1xX3NtYWxsID0gd2luZG93Lm1hdGNoTWVkaWEoXCIobWF4LXdpZHRoOjU2MHB4KVwiKTsiLCJjb25zdCBoZWFkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdoZWFkZXInKTtcbmNvbnN0IG1lbnUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWVudS1tYWluJyk7XG5jb25zdCBtZW51SXRlbXMgPSBtZW51LnF1ZXJ5U2VsZWN0b3JBbGwoJy5oZWFkZXJfX21lbnVfX2l0ZW0nKTtcbm1lbnVJdGVtcy5mb3JFYWNoKCAoaSkgPT4ge1xuICAgIGxldCBtZW51aXRlbSA9IGk7XG4gICAgbGV0IG1haW5saW5rID0gaS5xdWVyeVNlbGVjdG9yKCcuaGVhZGVyX19tZW51X19pdGVtX19saW5rJyk7XG4gICAgbGV0IGRkID0gaS5xdWVyeVNlbGVjdG9yKCcuZHJvcGRvd24nKTtcbiAgICBtZW51aXRlbS5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWVudGVyJywoKSA9PiB7XG4gICAgICAgIG1lbnVpdGVtLmNsYXNzTGlzdC5hZGQoJ2xpbmstYWN0aXZlJyk7XG4gICAgfSk7XG4gICAgbWVudWl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignbW91c2VsZWF2ZScsKCkgPT4ge1xuICAgICAgICBtZW51aXRlbS5jbGFzc0xpc3QucmVtb3ZlKCdsaW5rLWFjdGl2ZScpO1xuICAgIH0pO1xufSApOyIsIi8vIG1lbnUgdHJpZ2dlciAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tXG5cbmNvbnN0IHRyaWdnZXJtZW51ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnRyaWdnZXItbWVudScpO1xuY29uc3QgbWVudSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5tb2JpbGUtbWVudScpO1xuY29uc3QgYm9keSA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiQk9EWVwiKVswXTtcbnZhciBpc29wZW4gPSBmYWxzZTtcblxuY29uc3QgbWVudV9vcGVuID0gKCkgPT4ge1xuICBtZW51LnNldEF0dHJpYnV0ZSgnYXJpYS1wcmVzc2VkJyx0cnVlKTtcbiAgaXNvcGVuID0gdHJ1ZTtcbiAgbWVudS5jbGFzc0xpc3QuYWRkKCdvcGVuJyk7XG4gIG1lbnUuY2xhc3NMaXN0LnJlbW92ZSgnY2xvc2UnKTtcbiAgYm9keS5jbGFzc0xpc3QuYWRkKCdsb2NrZWQnKTtcbn1cbmNvbnN0IG1lbnVfY2xvc2UgPSAoKSA9PiB7XG4gIG1lbnUuc2V0QXR0cmlidXRlKCdhcmlhLXByZXNzZWQnLGZhbHNlKTtcbiAgaXNvcGVuID0gZmFsc2U7XG4gIG1lbnUuY2xhc3NMaXN0LmFkZCgnY2xvc2UnKTtcbiAgbWVudS5jbGFzc0xpc3QucmVtb3ZlKCdvcGVuJyk7XG4gIGJvZHkuY2xhc3NMaXN0LnJlbW92ZSgnbG9ja2VkJyk7XG59XG5cbnRyaWdnZXJtZW51LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJyxmdW5jdGlvbigpe1xuICBpc29wZW4gPyBtZW51X2Nsb3NlKCkgOiBtZW51X29wZW4oKTtcbn0pO1xuXG50cmlnZ2VybWVudS5hZGRFdmVudExpc3RlbmVyKCdrZXl1cCcsZnVuY3Rpb24oZSl7XG4gIGlmKCBlLmtleSA9PSAnRXNjYXBlJyAmJiBpc29wZW4gPT0gdHJ1ZSApe1xuICAgIG1lbnVfY2xvc2UoKTtcbiAgfVxufSk7IiwiLy8gc2Nyb2xsIGV2ZW50IC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuaW1wb3J0ICogYXMgc2IgZnJvbSAnLi9zY3JvbGxfcHJvZ3Jlc3NfaW5kaWNhdG9yLmpzJztcbmltcG9ydCAqIGFzIGd2IGZyb20gJy4vZ2xvYmFsX3ZhcmlhYmxlcy5qcyc7XG5cbmNvbnN0IGJhY2t0b3AgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYmFja3RvcCcpO1xuY29uc3QgYmFja3RvcGlubmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmJhY2t0b3BfX2lubmVyJyk7XG5jb25zdCBjb250ZW50c3RhcnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdtYWluJyk7XG5jb25zdCBjb250ZW50b2Zmc2V0ID0gY29udGVudHN0YXJ0LmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLnRvcCArIHBhZ2VZT2Zmc2V0O1xuY29uc3QgaGVhZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmhlYWRlcicpO1xuY29uc3QgYWxsZWxlbXMgPSBbc2IucHJvZ3Jlc3NfaW5kaWNhdG9yLCBiYWNrdG9wXTtcbmNvbnN0IGJvZHkgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdib2R5Jyk7XG5sZXQgc2Nyb2xsZGVsYXk7XG52YXIgaXNpdGRvd247XG5cbmNvbnN0IGJhY2t0b3BmdW5jID0gKCkgPT4ge1xuICBpZiAoaXNpdGRvd24pe1xuICAgIGZhZGVpbigpO1xuICAgIGlzaXRkb3duID0gZmFsc2U7XG4gIH1cbiAgY2xlYXJUaW1lb3V0KHNjcm9sbGRlbGF5KTtcbiAgc2Nyb2xsZGVsYXkgPSBzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7XG4gICAgZmFkZW91dCgpO1xuICAgIGlzaXRkb3duID0gdHJ1ZTtcbiAgfSwxNTAwKTtcbn1cblxuY29uc3QgZmFkZW91dCA9ICgpID0+IHtcbiAgYmFja3RvcGlubmVyLmNsYXNzTGlzdC5hZGQoJ2ZhZGVvdXQnKTtcbiAgYmFja3RvcGlubmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2ZhZGVpbicpO1xufTtcbmNvbnN0IGZhZGVpbiA9ICgpID0+IHtcbiAgYmFja3RvcGlubmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2ZhZGVvdXQnKTtcbiAgYmFja3RvcGlubmVyLmNsYXNzTGlzdC5hZGQoJ2ZhZGVpbicpO1xufTtcblxuY29uc3QgaGlkZXNob3cgPSBmdW5jdGlvbigpe1xuICB3aW5kb3cub25zY3JvbGwgPSAoKSA9PiB7XG4gICAgaWYgKGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdzaW5nbGUnKSl7XG4gICAgICBzYi5zY3JvbGxiYXIoKTtcbiAgICB9XG4gICAgaWYgKCB3aW5kb3cucGFnZVlPZmZzZXQgPCBjb250ZW50b2Zmc2V0ICl7XG4gICAgICBpZiAoYm9keS5jbGFzc0xpc3QuY29udGFpbnMoJ3NpbmdsZScpKXtcbiAgICAgICAgYWxsZWxlbXMuZm9yRWFjaCggKGUpID0+IHtcbiAgICAgICAgICBlLmNsYXNzTGlzdC5yZW1vdmUoJ3Zpc2libGUnKTtcbiAgICAgICAgICBlLmNsYXNzTGlzdC5hZGQoJ2hpZGRlbicpO1xuICAgICAgICB9KTtcbiAgICAgIH1cbiAgICAgIGhlYWRlci5jbGFzc0xpc3QucmVtb3ZlKCdoZWFkZXItLXNoYWxsb3cnKTtcbiAgICB9IGVsc2Uge1xuICAgICAgaWYgKGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdzaW5nbGUnKSl7XG4gICAgICAgIGFsbGVsZW1zLmZvckVhY2goIChlKSA9PiB7XG4gICAgICAgICAgZS5jbGFzc0xpc3QuYWRkKCd2aXNpYmxlJyk7XG4gICAgICAgICAgZS5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgICBoZWFkZXIuY2xhc3NMaXN0LmFkZCgnaGVhZGVyLS1zaGFsbG93Jyk7XG4gICAgfVxuICAgIGlmKGd2Lm1xX3NtYWxsLm1hdGNoZXMpe1xuICAgICAgYmFja3RvcGZ1bmMoKTtcbiAgICB9XG4gIH1cbn07XG5cbmhpZGVzaG93KCk7IiwiLy8gc2Nyb2xsYmFyIHByb2dyZXNzIGluZGljYXRvciAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuXG5leHBvcnQgY29uc3QgcHJvZ3Jlc3NfaW5kaWNhdG9yID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnByb2dyZXNzLWluZGljYXRvcicpO1xuXG5leHBvcnQgY29uc3Qgc2Nyb2xsYmFyID0gKCkgPT4ge1xuICB2YXIgZGlzcGxheWhlaWdodCA9IHdpbmRvdy5pbm5lckhlaWdodDtcbiAgdmFyIHBpbGxhcmNvbnRlbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuYXJ0aWNsZScpO1xuICB2YXIgYm9keWhlaWdodCA9IGRvY3VtZW50LmJvZHkuY2xpZW50SGVpZ2h0O1xuICB2YXIgcGlsbGFyY29udGVudGhlaWdodCA9IHBpbGxhcmNvbnRlbnQuY2xpZW50SGVpZ2h0O1xuICB2YXIgcGlsbGFyY29udGVudG9mZnNldCA9IHBpbGxhcmNvbnRlbnQub2Zmc2V0VG9wO1xuICB2YXIgd2luU2Nyb2xsID0gZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgfHwgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcDtcbiAgdmFyIHdpblNjcm9sbF9uZXcgPSB3aW5TY3JvbGwgLSBwaWxsYXJjb250ZW50b2Zmc2V0O1xuICB2YXIgd2luZFNjcm9sbF9uZXdfYm90dG9tID0gd2luU2Nyb2xsX25ldyArIHdpbmRvdy5pbm5lckhlaWdodDtcbiAgdmFyIHNjcm9sbGVkcGMgPSB3aW5kU2Nyb2xsX25ld19ib3R0b20gLyBwaWxsYXJjb250ZW50aGVpZ2h0ICogMTAwO1xuICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcIm15QmFyXCIpLnN0eWxlLndpZHRoID0gc2Nyb2xsZWRwYyArIFwiJVwiO1xufSJdfQ==
