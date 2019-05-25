/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

/*~~~~~~~~~~~~~~~~~
VARS
~~~~~~~~~~~~~~~~~*/
        var issue = 0;
        var initialized = false;
        var currentFont = null;
        var issueStyle = {};
        var lastFont = '';
        var isMobile = () => {
          if($(window).width() > 512) {
            return false;
          }else{
            return true
          }
        };
        var menuIsOpen = false;
        const headerHeight = $('header').outerHeight();
        const headerDefaultColour = $('header .inner').css('background-color');
        const stroke1 = $('.burger').find('.stroke:first-child');
        const stroke2 = $('.burger').find('.stroke:last-child');

        const Scrollbar = window.Scrollbar;
        let controller;

/*~~~~~~~~~~~~~~~~~
PRELOADER
~~~~~~~~~~~~~~~~~*/

        function preloading(bool) {
          if(bool) {
            console.log('preloading...');
            $('#global-preloader').css('display', 'block');
            TweenLite.fromTo('#global-preloader', 0.4, {opacity: 0, y: 30}, {opacity: 1, y: 0});
          }else {
            TweenLite.to('#global-preloader', 0.2, {opacity: 0, y: 30, onComplete(){
              $('#global-preloader').css('display', 'none');
            }});
          }
        }

/*~~~~~~~~~~~~~~~~~
BODYMOVIN
~~~~~~~~~~~~~~~~~*/

      bodymovin.loadAnimation({
        container: document.getElementById('global-preloader-animation'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        animationData: window.preloaderAnimation
      });

/*~~~~~~~~~~~~~~~~~
MENU
~~~~~~~~~~~~~~~~~*/

        var menuIsViewingIssues = true;

        const burgerDefault = {
          stroke1: {
            x: 0,
            y: 0,
            rotation: 0,
            top: 0
          },
          stroke2: {
            x: 0,
            y: 0,
            rotation: 0,
            bottom: 0
          }
        };

        const burgerHover = {
          stroke1: {
            x: 5,
            y: 0,
            rotation: 0,
            top: 0
          },
          stroke2: {
            x: 2,
            y: 0,
            rotation: 0,
            bottom: 0
          }
        };

        const burgerClose = {
          stroke1: {
            x: 0,
            y: -1,
            rotation: 45,
            top: '50%'
          },
          stroke2: {
            x: 0,
            y: -2,
            rotation: -45,
            bottom: '5px'
          }
        };

        function burgerX() {
          TweenLite.to(stroke1, 0.3, burgerClose.stroke1);
          TweenLite.to(stroke2, 0.3, burgerClose.stroke2);
        }

        function burgerSlide() {
          TweenLite.to(stroke1, 0.3, burgerHover.stroke1);
          TweenLite.to(stroke2, 0.3, burgerHover.stroke2);
        }

        function burgerDef() {
          TweenLite.to(stroke1, 0.3, burgerDefault.stroke1);
          TweenLite.to(stroke2, 0.3, burgerDefault.stroke2);
        }

        function openMenu() {
          menuIsOpen = true;
          burgerDef();
          TweenLite.to($('header'), 0.85, {ease: Power3.easeInOut, height: '100%', onComplete: function(){
            burgerX();
            TweenLite.to($('header .inner'), 0.4, {backgroundColor: String(issueStyle.primary)});

            //SHOW .NAV-CONTENT
            $('.nav-content').css({
              opacity: 0,
              display: 'block'
            });
            TweenLite.fromTo('.nav-content', 1, {y: 30, opacity: 0, skewY: 1}, {y: 0, opacity: 1, skewY: 0, delay: .4});


          }});
        }

        function closeMenu() {
          TweenLite.to($('.nav-content'), 0.3, {opacity: 0});
          TweenLite.to($('header'), 0.85, {ease: Power3.easeInOut, height: headerHeight+'px', delay: 0.3, onComplete: function(){
            menuIsOpen = false;
            burgerDef();
            TweenLite.to($('header .inner'), 0.4, {backgroundColor: String(headerDefaultColour)});
            $('.nav-content').css('opacity', 0);
          }});
          setTimeout(function(){
            $('.nav-content').css('display', 'none');
          },300);
        }

        function switchMenuView() {
          if(menuIsViewingIssues) {
            TweenLite.to('.recent-issues', .5, {opacity: 0, onComplete(){
              $('.recent-issues').css('display', 'none');
              $('.pages').css('display', 'block');
              TweenLite.fromTo('.pages', 1, {opacity: 0, y: 30, skewY: 1}, {opacity: 1, skewY: 0, scaleY: 1, y: 0});
              menuIsViewingIssues = !menuIsViewingIssues;
              toggleMenuViewBtn();
            }});
          } else {
            TweenLite.to('.pages', .5, {opacity: 0, onComplete(){
              $('.recent-issues').css('display', 'block');
              $('.pages').css('display', 'none');
              TweenLite.fromTo('.recent-issues', 1, {opacity: 0, y: 30, skewY: 1}, {opacity: 1, skewY: 0, scaleY: 1, y: 0});
              menuIsViewingIssues = !menuIsViewingIssues;
              toggleMenuViewBtn();
            }});
          }
        }

        function toggleMenuViewBtn() {
          $('.switch-view #pages, .switch-view #issues').toggleClass('view-btn-select');
        }

        function checkDimensions() {
          if(isMobile()) {
            compressLogo();
          }else {
            expandLogo();
          }
        }

        $('#z, #i, #o, #u').css('opacity', 0);

        function compressLogo() {
          TweenLite.to($('#z, #i, #o, #u'), .15, {opacity: 0});
        }

        function expandLogo() {
          TweenLite.to($('#z, #i, #o, #u'), .15, {opacity: 1});
        }

        $('.burger').click(function(){
          if(!menuIsOpen) {
            openMenu();
          } else{
            closeMenu();
          }
        });

        $('.switch-view a').click(function(){
          switchMenuView();
        });

        if(!Modernizr.touchevents) {
            $('.burger').hover(function(){
              if(!menuIsOpen) {
                burgerSlide();
              }
            }, function(){
              if(!menuIsOpen) {
                burgerDef();
              }
            });

          $('.search').hover(function(){
            TweenLite.to(this, 0.2, {scale: 1.1});
          }, function(){
            TweenLite.to(this, 0.2, {scale: 1});
          });
        }

        $(window).resize(function(){
          checkDimensions();
        });

        checkDimensions();

/*~~~~~~~~~~~~~~~~~~~
CONTROL ISSUE STYLES
~~~~~~~~~~~~~~~~~~~*/

        function setFonts(){
          font = issueStyle.font.replace('.', '');
          $('.font-primary').each(function() {
            classlist = $(this).attr('class').split(' ');
            $el = $(this);
            $.each(classlist, function(index, item) {
              if (item == lastFont) {
                $el.removeClass(String(item));
              }
            });
          });
          lastFont = font;
          $('.font-primary').addClass(font);
        }

        function setPreviewColors() {
          if($('.articles').length > 0) {

            $('.customize').each(function(){
              var fontColor = $(this).attr('data-font-color');
              var backgroundColor = $(this).attr('data-background-color');
              $(this).css('background', backgroundColor);
              $(this).find('.preview__font').css('color', fontColor);
              $(this).find('.preview__button p').css('color', fontColor);
              $(this).find('.read-article').css('border-color', fontColor + ' !important');
              $(this).find('.article-number p').css('color', fontColor);
              $(this).find('.article-number').css('border-color', fontColor);
            });
            //set read article button border color
            $('.article-preview').each(function(){
              var color = $(this).find('.article-title').css('color');
              $(this).find('.read-article').css('border', '4px solid ' + color);
            });

          }
        }

/*~~~~~~~~~~~~~~~~~
INIT SCRIPTS
~~~~~~~~~~~~~~~~~*/

        function checkIssue() {
          if (!initialized) {
            //First Load
            console.log('first load');
            if($('fields').data('issue') !== '') {
              issue = $('fields').data('issue');
            }else {
              issue = wpObject.currentIssue;
            }
          }else {
            //Not First Load
            console.log('not first load');
            var newIssue = $('fields').data('issue');
            if(newIssue !== issue) {
              issue = newIssue;
              issueStyle = $('fields').data();
            }
          }
          issueStyle = $('fields').data();
        }

        function pageloadAnimation($container) {
          $('.transition').each(function(index) {
            if(inViewport(this, {offset: -300})) {
              TweenLite.fromTo(this, 0.86, {opacity: 0, y: 20, skewY:2}, {opacity: 1, y: 0, skewY: 0, delay: ((index+1)/2.2)+0.8});
            }else {
              $(this).css('opacity', '0');
              inViewport(this, {offset: -300}, () => {
                TweenLite.fromTo(this, 0.86, {opacity: 0, y: 20, skewY:2}, {opacity: 1, y: 0, skewY: 0});
              });
            }
          });
          TweenLite.to($container, 0, {opacity: 1, delay: 1.3});
          setTimeout(function(){
            preloading(false);
          },1000);
        }

        function firstLoad() {
          preloading(true);
          TweenLite.to('.banner', 0.3, {opacity: 1});
          $('.main').imagesLoaded(()=> {
            pageloadAnimation($('.main'));
          });
        }

        function initialize(){
          console.log('initialize');
            if(!initialized){firstLoad()}
            checkIssue();
            setFonts();
            setPreviewColors();
            initialized = true
        }
        initialize();

/*~~~~~~~~~~~~~~~~~
OBJECT FIT POLYFIL
~~~~~~~~~~~~~~~~~*/


/*~~~~~~~~~~~~~~~~~
BARBA CONFIG
~~~~~~~~~~~~~~~~~*/

        Barba.Pjax.start();

        var PageTransition = Barba.BaseTransition.extend({
          start: function() {
            Promise
              .all([this.newContainerLoading,this.fadeOut()])
              .then(this.fadeIn.bind(this));
          },

          fadeOut: function() {
            var deferred = Barba.Utils.deferred();

            TweenLite.to(this.oldContainer, 0.4, {autoAlpha: 0, onComplete: function(){
              deferred.resolve();
              preloading(true);
            }});
            return deferred.promise;
          },

          fadeIn: function() {
            $newContainer = $(this.newContainer);
            this.done();
            initialize();
            $newContainer.css({
              'opacity': '0'
            });
            $newContainer.imagesLoaded(function(){
              pageloadAnimation($newContainer);
            });
          }
        });

        Barba.Pjax.getTransition = function() {
          return PageTransition;
        };


/*~~~~~~~~~~~~~~~~~
~~~~~~~~~~~~~~~~~~~
~~~~~~~~~~~~~~~~~*/


      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        //TweenLite.set('html', 0.3, {opacity: 1});
        var scrollbar = Scrollbar.init(document.querySelector('.wrap'), {
          damping: 0.08
        });







      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
