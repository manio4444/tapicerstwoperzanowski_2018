  // ################ TOUCHSCREEN_DETECT ###########
  /*
  * Add class to body for hover effects,  if touchscreen IS NOT detected
  * Function is from Modernizr touchevents.js
  * If there are bugs look for update on github:
  @ https://github.com/Modernizr/Modernizr/blob/master/feature-detects/touchevents.js
  */
  // Chrome (desktop) used to lie about its support on this, but that has since been rectified: http://crbug.com/36415
  function touchscreenDetect() {
    if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) return true;
    else $('body').addClass('noTouchscreen');
  }


  // ################ BACKTOTOP ###########
  function backToTopInit() {
  $('#backtotop').click(function(){
      $('html, body').animate({scrollTop: 0},'slow');
  });
  $(window).scroll(function(){
      if($(window).scrollTop()>300) $("#backtotop").addClass('visible');
      else $("#backtotop").removeClass('visible');
  });
}


// ################ DELETE_BEFORE_LOAD #########
function deleteBeforeLoad() {
    $('.beforeLoad').removeClass('beforeLoad');
}


// ################ MMENU_INIT ###########
function menuMobileObject() {
  //private
  var m_menu_hamb = document.querySelector('button.hamburger');
  var m_menu_cont = document.querySelector('.navigation_list');
  var m_menu_list = $('.navigation_list_el');

  return {
    //public
    toggle: function () {
      // console.log(self.m_menu_hamb);
      m_menu_hamb.classList.toggle('is-active');
      m_menu_cont.classList.toggle('show');
    },
    init: function() {
      if (m_menu_hamb && m_menu_cont) {
        m_menu_hamb.addEventListener('click', this.toggle, false);
      }
      m_menu_list.on('click', this.toggle);
      if (this.m_menu_list) {
        objectThis = this;
        this.m_menu_list.each(function(){
          $(this).click( this.toggle );
        });
      }
    },
  }
}

// ################ MENU_DESKTOP_SCROLL ###########
function menuDesktopObject() {
  //private
  var _mainNavContainer = document.querySelector('#navigation');
  var _addedClass = 'scrolled';
  var _expand = function() {
    _mainNavContainer.classList.add(_addedClass);
    // console.log('expand function');
  };
  var _collapse = function() {
    _mainNavContainer.classList.remove(_addedClass);
    // console.log('collapse function');
  };
  var _listenScroll = function() {
    var pos = window.pageYOffset || 0;
    if (pos > 200) _expand();
    else _collapse();
  };
  var _bindEvents = function() {
    if (_mainNavContainer) {
      window.addEventListener('scroll', _listenScroll, false);
    }
  };
  var _init = function() {
    _bindEvents();
  };

  return {
    //public
    expand : _expand,
    collapse : _collapse,
    init : _init
  }
}


// ################ testimonials_slider_init ###########
function testimonialsSliderInit() {
  $('.testimonials_list').slick({
    dots: true,
    prevArrow: '<span class="slick-prev">Previous</span>',
    nextArrow: '<span class="slick-next">Next</span>',
    autoplay: true,
    autoplaySpeed: 2000,
  });
}
