(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

require("./modules/global_variables.js");

require("./modules/menu_trigger.js");

require("./modules/main_nav.js");

require("./modules/scroll_event.js");

require("./modules/flickity.js");

},{"./modules/flickity.js":2,"./modules/global_variables.js":3,"./modules/main_nav.js":4,"./modules/menu_trigger.js":5,"./modules/scroll_event.js":6}],2:[function(require,module,exports){
"use strict";

var elem = document.querySelector('.flickity-carousel');
var flkty = new Flickity(elem, {
  // options
  pageDots: false,
  prevNextButtons: false,
  freeScroll: false,
  cellAlign: 'left',
  setGallerySize: true
});

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.mq_small = void 0;
var mq_small = window.matchMedia("(max-width:560px)");
exports.mq_small = mq_small;

},{}],4:[function(require,module,exports){
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

},{}],5:[function(require,module,exports){
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

},{}],6:[function(require,module,exports){
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

},{"./global_variables.js":3,"./scroll_progress_indicator.js":7}],7:[function(require,module,exports){
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJhc3NldHMvc2NyaXB0cy9tYWluLmpzIiwiYXNzZXRzL3NjcmlwdHMvbW9kdWxlcy9mbGlja2l0eS5qcyIsImFzc2V0cy9zY3JpcHRzL21vZHVsZXMvZ2xvYmFsX3ZhcmlhYmxlcy5qcyIsImFzc2V0cy9zY3JpcHRzL21vZHVsZXMvbWFpbl9uYXYuanMiLCJhc3NldHMvc2NyaXB0cy9tb2R1bGVzL21lbnVfdHJpZ2dlci5qcyIsImFzc2V0cy9zY3JpcHRzL21vZHVsZXMvc2Nyb2xsX2V2ZW50LmpzIiwiYXNzZXRzL3NjcmlwdHMvbW9kdWxlcy9zY3JvbGxfcHJvZ3Jlc3NfaW5kaWNhdG9yLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTs7QUFDQTs7QUFDQTs7QUFDQTs7QUFDQTs7Ozs7QUNKQSxJQUFJLElBQUksR0FBRyxRQUFRLENBQUMsYUFBVCxDQUF1QixvQkFBdkIsQ0FBWDtBQUNBLElBQUksS0FBSyxHQUFHLElBQUksUUFBSixDQUFjLElBQWQsRUFBb0I7QUFDOUI7QUFDQSxFQUFBLFFBQVEsRUFBRSxLQUZvQjtBQUc5QixFQUFBLGVBQWUsRUFBRSxLQUhhO0FBSTlCLEVBQUEsVUFBVSxFQUFFLEtBSmtCO0FBSzlCLEVBQUEsU0FBUyxFQUFFLE1BTG1CO0FBTTlCLEVBQUEsY0FBYyxFQUFFO0FBTmMsQ0FBcEIsQ0FBWjs7Ozs7Ozs7O0FDRE8sSUFBTSxRQUFRLEdBQUcsTUFBTSxDQUFDLFVBQVAsQ0FBa0IsbUJBQWxCLENBQWpCOzs7Ozs7QUNBUCxJQUFNLE1BQU0sR0FBRyxRQUFRLENBQUMsYUFBVCxDQUF1QixRQUF2QixDQUFmO0FBQ0EsSUFBTSxJQUFJLEdBQUcsUUFBUSxDQUFDLGNBQVQsQ0FBd0IsV0FBeEIsQ0FBYjtBQUNBLElBQU0sU0FBUyxHQUFHLElBQUksQ0FBQyxnQkFBTCxDQUFzQixxQkFBdEIs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QUMsZUFBVCxDQUF5QixTQUFwRTtBQUNBLE1BQUksYUFBYSxHQUFHLFNBQVMsR0FBRyxtQkFBaEM7QUFDQSxNQUFJLHFCQUFxQixHQUFHLGFBQWEsR0FBRyxNQUFNLENBQUMsV0FBbkQ7QUFDQSxNQUFJLFVBQVUsR0FBRyxxQkFBcUIsR0FBRyxtQkFBeEIsR0FBOEMsR0FBL0Q7QUFDQSxFQUFBLFFBQVEsQ0FBQyxjQUFULENBQXdCLE9BQXhCLEVBQWlDLEtBQWpDLENBQXVDLEtBQXZDLEdBQStDLFVBQVUsR0FBRyxHQUE1RDtBQUNELENBWE0iLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIHIoZSxuLHQpe2Z1bmN0aW9uIG8oaSxmKXtpZighbltpXSl7aWYoIWVbaV0pe3ZhciBjPVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmU7aWYoIWYmJmMpcmV0dXJuIGMoaSwhMCk7aWYodSlyZXR1cm4gdShpLCEwKTt2YXIgYT1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK2krXCInXCIpO3Rocm93IGEuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixhfXZhciBwPW5baV09e2V4cG9ydHM6e319O2VbaV1bMF0uY2FsbChwLmV4cG9ydHMsZnVuY3Rpb24ocil7dmFyIG49ZVtpXVsxXVtyXTtyZXR1cm4gbyhufHxyKX0scCxwLmV4cG9ydHMscixlLG4sdCl9cmV0dXJuIG5baV0uZXhwb3J0c31mb3IodmFyIHU9XCJmdW5jdGlvblwiPT10eXBlb2YgcmVxdWlyZSYmcmVxdWlyZSxpPTA7aTx0Lmxlbmd0aDtpKyspbyh0W2ldKTtyZXR1cm4gb31yZXR1cm4gcn0pKCkiLCJpbXBvcnQgJy4vbW9kdWxlcy9nbG9iYWxfdmFyaWFibGVzLmpzJztcbmltcG9ydCAnLi9tb2R1bGVzL21lbnVfdHJpZ2dlci5qcyc7XG5pbXBvcnQgJy4vbW9kdWxlcy9tYWluX25hdi5qcyc7XG5pbXBvcnQgJy4vbW9kdWxlcy9zY3JvbGxfZXZlbnQuanMnO1xuaW1wb3J0ICcuL21vZHVsZXMvZmxpY2tpdHkuanMnOyIsInZhciBlbGVtID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmZsaWNraXR5LWNhcm91c2VsJyk7XG52YXIgZmxrdHkgPSBuZXcgRmxpY2tpdHkoIGVsZW0sIHtcbiAgLy8gb3B0aW9uc1xuICBwYWdlRG90czogZmFsc2UsXG4gIHByZXZOZXh0QnV0dG9uczogZmFsc2UsXG4gIGZyZWVTY3JvbGw6IGZhbHNlLFxuICBjZWxsQWxpZ246ICdsZWZ0JyxcbiAgc2V0R2FsbGVyeVNpemU6IHRydWVcbn0pOyIsImV4cG9ydCBjb25zdCBtcV9zbWFsbCA9IHdpbmRvdy5tYXRjaE1lZGlhKFwiKG1heC13aWR0aDo1NjBweClcIik7IiwiY29uc3QgaGVhZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignaGVhZGVyJyk7XG5jb25zdCBtZW51ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ21lbnUtbWFpbicpO1xuY29uc3QgbWVudUl0ZW1zID0gbWVudS5xdWVyeVNlbGVjdG9yQWxsKCcuaGVhZGVyX19tZW51X19pdGVtJyk7XG5tZW51SXRlbXMuZm9yRWFjaCggKGkpID0+IHtcbiAgICBsZXQgbWVudWl0ZW0gPSBpO1xuICAgIGxldCBtYWlubGluayA9IGkucXVlcnlTZWxlY3RvcignLmhlYWRlcl9fbWVudV9faXRlbV9fbGluaycpO1xuICAgIGxldCBkZCA9IGkucXVlcnlTZWxlY3RvcignLmRyb3Bkb3duJyk7XG4gICAgbWVudWl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignbW91c2VlbnRlcicsKCkgPT4ge1xuICAgICAgICBtZW51aXRlbS5jbGFzc0xpc3QuYWRkKCdsaW5rLWFjdGl2ZScpO1xuICAgIH0pO1xuICAgIG1lbnVpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlbGVhdmUnLCgpID0+IHtcbiAgICAgICAgbWVudWl0ZW0uY2xhc3NMaXN0LnJlbW92ZSgnbGluay1hY3RpdmUnKTtcbiAgICB9KTtcbn0gKTsiLCIvLyBtZW51IHRyaWdnZXIgLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuXG5jb25zdCB0cmlnZ2VybWVudSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy50cmlnZ2VyLW1lbnUnKTtcbmNvbnN0IG1lbnUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubW9iaWxlLW1lbnUnKTtcbmNvbnN0IGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5VGFnTmFtZShcIkJPRFlcIilbMF07XG52YXIgaXNvcGVuID0gZmFsc2U7XG5cbmNvbnN0IG1lbnVfb3BlbiA9ICgpID0+IHtcbiAgbWVudS5zZXRBdHRyaWJ1dGUoJ2FyaWEtcHJlc3NlZCcsdHJ1ZSk7XG4gIGlzb3BlbiA9IHRydWU7XG4gIG1lbnUuY2xhc3NMaXN0LmFkZCgnb3BlbicpO1xuICBtZW51LmNsYXNzTGlzdC5yZW1vdmUoJ2Nsb3NlJyk7XG4gIGJvZHkuY2xhc3NMaXN0LmFkZCgnbG9ja2VkJyk7XG59XG5jb25zdCBtZW51X2Nsb3NlID0gKCkgPT4ge1xuICBtZW51LnNldEF0dHJpYnV0ZSgnYXJpYS1wcmVzc2VkJyxmYWxzZSk7XG4gIGlzb3BlbiA9IGZhbHNlO1xuICBtZW51LmNsYXNzTGlzdC5hZGQoJ2Nsb3NlJyk7XG4gIG1lbnUuY2xhc3NMaXN0LnJlbW92ZSgnb3BlbicpO1xuICBib2R5LmNsYXNzTGlzdC5yZW1vdmUoJ2xvY2tlZCcpO1xufVxuXG50cmlnZ2VybWVudS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsZnVuY3Rpb24oKXtcbiAgaXNvcGVuID8gbWVudV9jbG9zZSgpIDogbWVudV9vcGVuKCk7XG59KTtcblxudHJpZ2dlcm1lbnUuYWRkRXZlbnRMaXN0ZW5lcigna2V5dXAnLGZ1bmN0aW9uKGUpe1xuICBpZiggZS5rZXkgPT0gJ0VzY2FwZScgJiYgaXNvcGVuID09IHRydWUgKXtcbiAgICBtZW51X2Nsb3NlKCk7XG4gIH1cbn0pOyIsIi8vIHNjcm9sbCBldmVudCAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cbmltcG9ydCAqIGFzIHNiIGZyb20gJy4vc2Nyb2xsX3Byb2dyZXNzX2luZGljYXRvci5qcyc7XG5pbXBvcnQgKiBhcyBndiBmcm9tICcuL2dsb2JhbF92YXJpYWJsZXMuanMnO1xuXG5jb25zdCBiYWNrdG9wID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmJhY2t0b3AnKTtcbmNvbnN0IGJhY2t0b3Bpbm5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5iYWNrdG9wX19pbm5lcicpO1xuY29uc3QgY29udGVudHN0YXJ0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignbWFpbicpO1xuY29uc3QgY29udGVudG9mZnNldCA9IGNvbnRlbnRzdGFydC5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKS50b3AgKyBwYWdlWU9mZnNldDtcbmNvbnN0IGhlYWRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5oZWFkZXInKTtcbmNvbnN0IGFsbGVsZW1zID0gW3NiLnByb2dyZXNzX2luZGljYXRvciwgYmFja3RvcF07XG5jb25zdCBib2R5ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYm9keScpO1xubGV0IHNjcm9sbGRlbGF5O1xudmFyIGlzaXRkb3duO1xuXG5jb25zdCBiYWNrdG9wZnVuYyA9ICgpID0+IHtcbiAgaWYgKGlzaXRkb3duKXtcbiAgICBmYWRlaW4oKTtcbiAgICBpc2l0ZG93biA9IGZhbHNlO1xuICB9XG4gIGNsZWFyVGltZW91dChzY3JvbGxkZWxheSk7XG4gIHNjcm9sbGRlbGF5ID0gc2V0VGltZW91dChmdW5jdGlvbigpe1xuICAgIGZhZGVvdXQoKTtcbiAgICBpc2l0ZG93biA9IHRydWU7XG4gIH0sMTUwMCk7XG59XG5cbmNvbnN0IGZhZGVvdXQgPSAoKSA9PiB7XG4gIGJhY2t0b3Bpbm5lci5jbGFzc0xpc3QuYWRkKCdmYWRlb3V0Jyk7XG4gIGJhY2t0b3Bpbm5lci5jbGFzc0xpc3QucmVtb3ZlKCdmYWRlaW4nKTtcbn07XG5jb25zdCBmYWRlaW4gPSAoKSA9PiB7XG4gIGJhY2t0b3Bpbm5lci5jbGFzc0xpc3QucmVtb3ZlKCdmYWRlb3V0Jyk7XG4gIGJhY2t0b3Bpbm5lci5jbGFzc0xpc3QuYWRkKCdmYWRlaW4nKTtcbn07XG5cbmNvbnN0IGhpZGVzaG93ID0gZnVuY3Rpb24oKXtcbiAgd2luZG93Lm9uc2Nyb2xsID0gKCkgPT4ge1xuICAgIGlmIChib2R5LmNsYXNzTGlzdC5jb250YWlucygnc2luZ2xlJykpe1xuICAgICAgc2Iuc2Nyb2xsYmFyKCk7XG4gICAgfVxuICAgIGlmICggd2luZG93LnBhZ2VZT2Zmc2V0IDwgY29udGVudG9mZnNldCApe1xuICAgICAgaWYgKGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdzaW5nbGUnKSl7XG4gICAgICAgIGFsbGVsZW1zLmZvckVhY2goIChlKSA9PiB7XG4gICAgICAgICAgZS5jbGFzc0xpc3QucmVtb3ZlKCd2aXNpYmxlJyk7XG4gICAgICAgICAgZS5jbGFzc0xpc3QuYWRkKCdoaWRkZW4nKTtcbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgICBoZWFkZXIuY2xhc3NMaXN0LnJlbW92ZSgnaGVhZGVyLS1zaGFsbG93Jyk7XG4gICAgfSBlbHNlIHtcbiAgICAgIGlmIChib2R5LmNsYXNzTGlzdC5jb250YWlucygnc2luZ2xlJykpe1xuICAgICAgICBhbGxlbGVtcy5mb3JFYWNoKCAoZSkgPT4ge1xuICAgICAgICAgIGUuY2xhc3NMaXN0LmFkZCgndmlzaWJsZScpO1xuICAgICAgICAgIGUuY2xhc3NMaXN0LnJlbW92ZSgnaGlkZGVuJyk7XG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgICAgaGVhZGVyLmNsYXNzTGlzdC5hZGQoJ2hlYWRlci0tc2hhbGxvdycpO1xuICAgIH1cbiAgICBpZihndi5tcV9zbWFsbC5tYXRjaGVzKXtcbiAgICAgIGJhY2t0b3BmdW5jKCk7XG4gICAgfVxuICB9XG59O1xuXG5oaWRlc2hvdygpOyIsIi8vIHNjcm9sbGJhciBwcm9ncmVzcyBpbmRpY2F0b3IgLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxuZXhwb3J0IGNvbnN0IHByb2dyZXNzX2luZGljYXRvciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5wcm9ncmVzcy1pbmRpY2F0b3InKTtcblxuZXhwb3J0IGNvbnN0IHNjcm9sbGJhciA9ICgpID0+IHtcbiAgdmFyIGRpc3BsYXloZWlnaHQgPSB3aW5kb3cuaW5uZXJIZWlnaHQ7XG4gIHZhciBwaWxsYXJjb250ZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmFydGljbGUnKTtcbiAgdmFyIGJvZHloZWlnaHQgPSBkb2N1bWVudC5ib2R5LmNsaWVudEhlaWdodDtcbiAgdmFyIHBpbGxhcmNvbnRlbnRoZWlnaHQgPSBwaWxsYXJjb250ZW50LmNsaWVudEhlaWdodDtcbiAgdmFyIHBpbGxhcmNvbnRlbnRvZmZzZXQgPSBwaWxsYXJjb250ZW50Lm9mZnNldFRvcDtcbiAgdmFyIHdpblNjcm9sbCA9IGRvY3VtZW50LmJvZHkuc2Nyb2xsVG9wIHx8IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zY3JvbGxUb3A7XG4gIHZhciB3aW5TY3JvbGxfbmV3ID0gd2luU2Nyb2xsIC0gcGlsbGFyY29udGVudG9mZnNldDtcbiAgdmFyIHdpbmRTY3JvbGxfbmV3X2JvdHRvbSA9IHdpblNjcm9sbF9uZXcgKyB3aW5kb3cuaW5uZXJIZWlnaHQ7XG4gIHZhciBzY3JvbGxlZHBjID0gd2luZFNjcm9sbF9uZXdfYm90dG9tIC8gcGlsbGFyY29udGVudGhlaWdodCAqIDEwMDtcbiAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJteUJhclwiKS5zdHlsZS53aWR0aCA9IHNjcm9sbGVkcGMgKyBcIiVcIjtcbn0iXX0=
