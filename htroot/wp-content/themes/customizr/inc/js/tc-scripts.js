/* ==========================================================
 * Customizr various scripts
 * ========================================================== */

jQuery(document).ready(function($) {
!function ($) {

  //"use strict"; // jshint ;_;

  $(window).on('load', function () {
     
     /* Detect layout and reorder content divs
      * ============== */
    var $window = $(window);

    function checkWidthonload() {
    var windowsize = $window.width();
    var target = $("#main-wrapper .container .span3.tc-sidebar");
    if (windowsize < 767 && $(target).length > 0) {
        //if the window is smaller than 767px wide then turn
        $("#main-wrapper .container .article-container").insertBefore(target);
      }
    }

    function checkWidth() {
    var windowsize = $window.width();
    var target = $("#main-wrapper .container .article-container")
    if (windowsize < 767) {
        //if the window is smaller than 767px wide then turn
        $("#main-wrapper .container .span3").insertAfter(target);
      }
    else {
      if ($("#main-wrapper .container .span3.left").length > 0) {
        $("#main-wrapper .container .span3.left").insertBefore(target);
        }
      if ($("#main-wrapper .container .span3.right").length > 0) {
        $("#main-wrapper .container .span3.right").insertAfter(target);
        }
      }
    }

     // Bind event listener after resize event
    var rtime = new Date(1, 1, 2000, 12,00,00);
    var timeout = false;
    var delta = 200;
    $(window).resize(function() {
      rtime = new Date();
      if (timeout === false) {
        timeout = true;
        setTimeout(checkWidth, delta);
      }
    });
    
    // Check width on load and reorders block if necessary
    checkWidthonload();

    // Add hover class on front widgets
      $(".widget-front, article").hover(
        function () {
          $(this).addClass('hover');
        },
        function () {
          $(this).removeClass('hover');
        });


        //arrows bullet list effect
        $('.widget li').hover(function() {
          $(this).addClass("on");
        }, function() {
        $(this).removeClass("on");
      });
    })

}(window.jQuery);

});