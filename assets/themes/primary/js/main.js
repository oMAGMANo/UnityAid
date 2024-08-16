(function ($) {
  "use strict";

  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {
    // ============== Header Hide Click On Body Js Start ========
    $(".header-button").on("click", function () {
      $(".body-overlay").toggleClass("show");
    });

    $(".body-overlay").on("click", function () {
      $(".header-button").trigger("click");
      $(this).removeClass("show");
    });
    // =============== Header Hide Click On Body Js End =========

    // ========================== Header Hide Scroll Bar Js Start =====================
    $(".navbar-toggler.header-button").on("click", function () {
      $("body").toggleClass("scroll-hide-sm");
    });

    $(".body-overlay").on("click", function () {
      $("body").removeClass("scroll-hide-sm");
    });
    // ========================== Header Hide Scroll Bar Js End =====================

    // ========================== Small Device Header Menu On Click Dropdown menu collapse Stop Js Start =====================
    $(".dropdown-item").on("click", function () {
      $(this).closest(".dropdown-menu").addClass("d-block");
    });
    // ========================== Small Device Header Menu On Click Dropdown menu collapse Stop Js End =====================

    // ========================== Add Attribute For Bg Image Js Start =====================
    $(".bg-img").css("background-image", function () {
      var bg = "url(" + $(this).data("background-image") + ")";
      return bg;
    });
    // ========================== Add Attribute For Bg Image Js End =====================

    // ========================== Add Attribute For Bg Mask Image Js Start =====================
    $("[data-mask-image]").css("mask-image", function () {
      var bg = "url(" + $(this).data("mask-image") + ")";
      return bg;
    });
    // ========================== Add Attribute For Bg Mask Image Js End =====================

    // ================== Password Show Hide Js Start ==========
    $(".toggle-password").on("click", function () {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("id"));

      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    // =============== Password Show Hide Js End =================

    // ========================= Banner Slider Js Start ==============
    $('.banner-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      fade: true,
      pauseOnHover: false,
      nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
      prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
    });
    // ========================= Banner Slider Js End ===================

    // ========================= Cause Category Slider Js Start ==============
    $('.cause-category__slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right"></i></button>',
      prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left"></i></button>',
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            arrows: false
          }
        },
        {
          breakpoint: 1200,
          settings: {
            arrows: false,
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow: 2,
          }
        }
      ]
    });
    // ========================= Cause Category Slider Js End ===================

    // ========================= New Campaign Slider Js Start ==============
    $('.new-campaign__slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            centerMode: true,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });
    // ========================= New Campaign Slider Js End ===================

    // ========================= Slick Slider Js Start ==============
    $(".testimonial-img-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      asNavFor: ".testimonial-txt-slider",
      nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right"></i></button>',
      prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left"></i></button>',
    });

    $(".testimonial-txt-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 1500,
      fade: true,
      arrows: false,
      asNavFor: ".testimonial-img-slider",
    });
    // ========================= Slick Slider Js End ===================

    // ========================= Client Slider Js Start ===============
    $(".payment-gateway__slider").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1000,
      pauseOnHover: true,
      speed: 2000,
      dots: false,
      arrows: false,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-long-arrow-alt-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-long-arrow-alt-right"></i></button>',
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 5,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 3,
          },
        },
      ],
    });
    // ========================= Client Slider Js End ===================

    // ================== Sidebar Menu Js Start ===============
    // Sidebar Dropdown Menu Start
    $(".has-dropdown > a").click(function () {
      $(".sidebar-submenu").slideUp(200);

      if ($(this).parent().hasClass("active")) {
        $(".has-dropdown").removeClass("active");
        $(this).parent().removeClass("active");
      } else {
        $(".has-dropdown").removeClass("active");
        $(this).next(".sidebar-submenu").slideDown(200);
        $(this).parent().addClass("active");
      }
    });
    // Sidebar Dropdown Menu End

    // Sidebar Icon & Overlay js
    $(".dashboard-body__bar-icon").on("click", function () {
      $(".sidebar-menu").addClass("show-sidebar");
      $(".sidebar-overlay").addClass("show");
    });

    $(".sidebar-menu__close, .sidebar-overlay").on("click", function () {
      $(".sidebar-menu").removeClass("show-sidebar");
      $(".sidebar-overlay").removeClass("show");
    });
    // Sidebar Icon & Overlay js
    // ===================== Sidebar Menu Js End =================

    // ==================== Dashboard User Profile Dropdown Start ==================
    $(".user-info__button").on("click", function (event) {
      event.stopPropagation(); // Prevent the click event from propagating to the body
      $(".user-info-dropdown").toggleClass("show");
    });

    $(".user-info-dropdown__link").on("click", function (event) {
      event.stopPropagation(); // Prevent the click event from propagating to the body
      $(".user-info-dropdown").addClass("show");
    });

    $("body").on("click", function () {
      $(".user-info-dropdown").removeClass("show");
    });
    // ==================== Dashboard User Profile Dropdown End ==================

    // ==================== Custom Sidebar Dropdown Menu Js Start ==================
    $(".has-submenu").on("click", function (event) {
      event.preventDefault(); // Prevent the default anchor link behavior

      // Check if this submenu is currently visible
      var isOpen = $(this).find(".sidebar-submenu").is(":visible");

      // Hide all submenus initially
      $(".sidebar-submenu").slideUp();

      // Remove the "active" class from all li elements
      $(".sidebar-menu__item").removeClass("active");

      // If this submenu was not open, toggle its visibility and add the "active" class to the clicked li
      if (!isOpen) {
        $(this).find(".sidebar-submenu").slideToggle(500);
        $(this).addClass("active");
      }
    });
    // ==================== Custom Sidebar Dropdown Menu Js End ==================

    // ========================= Odometer Counter Up Js End ==========
    $(".odometer").isInViewport(function (status) {
      if (status === "entered") {
        setTimeout(function () {
          $(".odometer").each(function () {
            $(this).html($(this).attr("data-count"));
          });
        }, 0);
      }
    });
    // ========================= Odometer Up Counter Js End =====================

    // ========================= Lightbox Start ==========
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
    });
    // ========================= Lightbox End ==========

    // ========================= Share Link Copy Start ==========
    var pageUrl = window.location.href;
    $('#shareLink').val(pageUrl);

    $('.share-link__copy').on('click', function () {
      var inputElement = $('#shareLink');
      inputElement.select();
      document.execCommand('copy');
      $('.share-link__badge').addClass('show');

      setTimeout(function () {
        $('.share-link__badge').removeClass('show');
      }, 1500);
    });
    // ========================= Share Link Copy End ==========

    // ========================= Account Setup Key Copy Start ==========
    $('.account-setup-key__copy').on('click', function () {
      var inputElement = $('#accountSetupKey');
      inputElement.select();
      document.execCommand('copy');
      $('.account-setup-key__badge').addClass('show');

      setTimeout(function () {
        $('.account-setup-key__badge').removeClass('show');
      }, 1500);
    });
    // ========================= Account Setup Key Copy End ==========

    // ========================= Withdraw Table Search Start ==========
    $('#searchInput').on('keyup', function () {
      const searchValue = $(this).val().toLowerCase();
      let found = false;

      $('table#searchTable tbody tr').each(function () {
        const cell = $(this).find('td:nth-child(2)');
        const cellValue = cell.text().toLowerCase();

        if (cellValue.includes(searchValue)) {
          $(this).removeClass('d-none');
          found = true;
        } else {
          $(this).addClass('d-none');
        }
      });

      if (!found) {
        $('.not-found-row').removeClass('d-none');
      } else {
        $('.not-found-row').addClass('d-none');
      }
    });
    // ========================= Withdraw Table Search End ==========

    // ========================= Aos Animation Start ==========
    AOS.init({
      once: true,
    });

    function handleDynamicChanges() {
      AOS.refresh();
    }

    window.addEventListener('scroll', handleDynamicChanges);
    window.addEventListener('resize', handleDynamicChanges);
    // ========================= Aos Animation End ==========

    // ========================= Campaign Countdown Start ==========
    $(".campaign__countdown").each(function () {
      var targetDate = new Date($(this).data("target-date")).getTime();
      var $countdownElement = $(this);
      var countdownInterval = setInterval(function () {
        var currentDate = new Date().getTime();
        var remainingTime = targetDate - currentDate;
        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        $countdownElement.html("<span>" + days + "d</span><span>" + hours + "h</span><span>" + minutes + "m</span><span>" + seconds + "s</span>");

        if (remainingTime <= 0) {
          clearInterval(countdownInterval);
          $countdownElement.html("<span>0d</span><span>0h</span><span>0m</span><span>0s</span>");
        }
      }, 1000);
    });
    // ========================= Campaign Countdown End ==========

    // ========================= Campaign Donation Form Start ==========
    $('input[name=donationAmount]').on('change', function () {
      if ($(this).is('[id=customDonationAmount]:checked')) {
        $('#donationAmount').prop('readonly', false).focus().val('');
      } else {
        var donationAmount = $(this).data('amount');
        $('#donationAmount').prop('readonly', true).val(donationAmount);
      }
    });
    // ========================= Campaign Donation Form End ==========

    // ========================= Image Upload With Preview Start ==========
    function updatePreviewLogo(file) {
      if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = document.createElement('img');
          img.src = e.target.result;
          $('.image-preview').html(img);
          $('.image-preview').addClass('active');
        }

        reader.readAsDataURL(file);
      } else {
        $('.image-preview').html('+');
        $('.image-preview').removeClass('active');
      }
    }

    $('#imageUpload').change(function () {
      updatePreviewLogo(this.files[0]);
    });

    $('#imageUpload').on('click', '.custom-file-input-clear', function () {
      updatePreviewLogo(null);
    });
    // ========================= Image Upload With Preview End ==========

    // ========================= CK Editor Start ==========
    if ($('.ck-editor').length) {
      window.editors = {};

      document.querySelectorAll('.ck-editor').forEach((node, index) => {
        ClassicEditor
          .create(node, {})
          .then(newEditor => {
            window.editors[index] = newEditor
          });
      });
    }
    // ========================= CK Editor End ==========
  });
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
  $(window).on("load", function () {
    $(".preloader").fadeOut();
  });
  // ========================= Preloader Js End=====================

  // ========================= Header Sticky Js Start ==============
  $(window).on("scroll", function () {
    if ($(window).scrollTop() >= 300) {
      $(".header").addClass("fixed-header");
    } else {
      $(".header").removeClass("fixed-header");
    }
  });
  // ========================= Header Sticky Js End===================

  //============================ Scroll To Top Icon Js Start =========
  var btn = $(".scroll-top");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });

  btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
  });
  //========================= Scroll To Top Icon Js End ======================
})(jQuery);
