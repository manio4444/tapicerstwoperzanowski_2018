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


// ################ GOOGLE MAPS #########
function initMap() {

var styles=[{featureType:"administrative",elementType:"geometry",stylers:[{color:"#a7a7a7"}]},{featureType:"administrative",elementType:"labels.text.fill",stylers:[{visibility:"on"},{color:"#737373"}]},{featureType:"landscape",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#f1f1f1"}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#dadada"}]},{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"poi",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#696969"}]},{featureType:"road",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#d2d2d2"},{visibility:"on"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{visibility:"on"},{color:"#cdcdcd"}]},{featureType:"road.arterial",elementType:"geometry.fill",stylers:[{color:"#ffffff"}]},{featureType:"road.arterial",elementType:"geometry.stroke",stylers:[{color:"#d6d6d6"}]},{featureType:"road.local",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#ffffff"},{weight:1.8}]},{featureType:"road.local",elementType:"geometry.stroke",stylers:[{color:"#d7d7d7"},{visibility:"on"}]},{featureType:"transit",elementType:"all",stylers:[{color:"#808080"},{visibility:"off"}]},{featureType:"water",elementType:"geometry.fill",stylers:[{color:"#c4c4c4"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"off"}]}];
  var coordinates = new google.maps.LatLng(lang['contact_map_latitude'], lang['contact_map_longitude']);
  var marker1_pos = new google.maps.LatLng(lang['contact_latitude_marker1'], lang['contact_longitude_marker1']);
  // var marker2_pos = new google.maps.LatLng(lang['contact_latitude_marker2'], lang['contact_longitude_marker2']);

  // if (document.body.offsetWidth>=1024) var zoomVar = 15;
  // else var zoomVar = 3;
  var zoomVar = 15
  var optionsMap = {
    center: coordinates,
    zoom: zoomVar,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: styles,
    disableDefaultUI: true,
    // zoomControl: false,
    // scaleControl: false,
    // scrollwheel: false,
    // disableDoubleClickZoom: true,
    // draggable: false,
  };

  var pinImage = new google.maps.MarkerImage(
    'templates/default/img/marker.png',
    new google.maps.Size(89, 96), //size of marker in px, optional, for cropping.
    new google.maps.Point(0,0), //size of marker in px, optional, for cropping.
    new google.maps.Point(44, 96) //pointing place (anchor?) by marker in px position.
  );

  var map = new google.maps.Map(document.getElementById("google_map"), optionsMap);
  var marker1 = new google.maps.Marker({
    position: marker1_pos,
    map: map,
    icon: pinImage
  });
  // var marker2 = new google.maps.Marker({
  //   position: marker2_pos,
  //   map: map,
  //   icon: pinImage
  // });
  google.maps.event.addListener(marker1, 'click', function () {
    window.open(lang['contact_gmaps_url1'], '_blank');
  });
  // google.maps.event.addListener(marker2, 'click', function () {
  //   window.open(lang['contact_gmaps_url2'], '_blank');
  // });
} //end function
