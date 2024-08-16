"use strict";
let isRtl = window.Helpers.isRtl(), isDarkStyle = window.Helpers.isDarkStyle(), menu, animate, isHorizontalLayout = !1;
document.getElementById("layout-menu") && (isHorizontalLayout = document.getElementById("layout-menu").classList.contains("menu-horizontal")),
    function () {
        setTimeout(function () {
            window.Helpers.initCustomOptionCheck()
        }, 1e3),
            document.querySelectorAll("#layout-menu").forEach(function (e) {
                menu = new Menu(e, {
                    orientation: isHorizontalLayout ? "horizontal" : "vertical",
                    closeChildren: !!isHorizontalLayout,
                    showDropdownOnHover: localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover") ? "true" === localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover") : void 0 === window.templateCustomizer || window.templateCustomizer.settings.defaultShowDropdownOnHover
                }),
                    window.Helpers.scrollToActive(animate = !1),
                    window.Helpers.mainMenu = menu
            });
        document.querySelectorAll(".layout-menu-toggle").forEach(e => {
            e.addEventListener("click", e => {
                if (e.preventDefault(),
                    window.Helpers.toggleCollapsed(),
                    config.enableMenuLocalStorage && !window.Helpers.isSmallScreen())
                    try {
                        localStorage.setItem("templateCustomizer-" + templateName + "--LayoutCollapsed", String(window.Helpers.isCollapsed()));
                        var t, o = document.querySelector(".template-customizer-layouts-options");
                        o && (t = window.Helpers.isCollapsed() ? "collapsed" : "expanded",
                            o.querySelector(`input[value="${t}"]`).click())
                    } catch (e) { }
            }
            )
        }
        );
        if (document.getElementById("layout-menu")) {
            var t = document.getElementById("layout-menu");
            var o = function () {
                Helpers.isSmallScreen() || document.querySelector(".layout-menu-toggle").classList.add("d-block")
            };
            let e = null;
            t.onmouseenter = function () {
                e = Helpers.isSmallScreen() ? setTimeout(o, 0) : setTimeout(o, 300)
            }
                ,
                t.onmouseleave = function () {
                    document.querySelector(".layout-menu-toggle").classList.remove("d-block"),
                        clearTimeout(e)
                }
        }
        window.Helpers.swipeIn(".drag-target", function (e) {
            window.Helpers.setCollapsed(!1)
        }),
            window.Helpers.swipeOut("#layout-menu", function (e) {
                window.Helpers.isSmallScreen() && window.Helpers.setCollapsed(!0)
            });
        let e = document.getElementsByClassName("menu-inner")
            , n = document.getElementsByClassName("menu-inner-shadow")[0];
        0 < e.length && n && e[0].addEventListener("ps-scroll-y", function () {
            this.querySelector(".ps__thumb-y").offsetTop ? n.style.display = "block" : n.style.display = "none"
        });
        var a, t = document.querySelector(".dropdown-style-switcher"), s = localStorage.getItem("templateCustomizer-" + templateName + "--Style") || (window.templateCustomizer?.settings?.defaultStyle ?? "light");
        function r() {
            var e = document.querySelectorAll("[data-i18n]")
                , t = document.querySelector('.dropdown-item[data-language="' + i18next.language + '"]');
            t && t.click(),
                e.forEach(function (e) {
                    e.innerHTML = i18next.t(e.dataset.i18n)
                })
        }
        s = document.querySelector(".dropdown-notifications-all");
        function c(e) {
            "show.bs.collapse" == e.type || "show.bs.collapse" == e.type ? e.target.closest(".accordion-item").classList.add("active") : e.target.closest(".accordion-item").classList.remove("active")
        }
        const d = document.querySelectorAll(".dropdown-notifications-read");
        s && s.addEventListener("click", e => {
            d.forEach(e => {
                e.closest(".dropdown-notifications-item").classList.add("marked-as-read")
            }
            )
        }
        ),
            d && d.forEach(t => {
                t.addEventListener("click", e => {
                    t.closest(".dropdown-notifications-item").classList.toggle("marked-as-read")
                }
                )
            }
            ),
            document.querySelectorAll(".dropdown-notifications-archive").forEach(t => {
                t.addEventListener("click", e => {
                    t.closest(".dropdown-notifications-item").remove()
                }
                )
            }
            ),
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
                return new bootstrap.Tooltip(e)
            });
        [].slice.call(document.querySelectorAll(".accordion")).map(function (e) {
            e.addEventListener("show.bs.collapse", c),
                e.addEventListener("hide.bs.collapse", c)
        });
        if (window.Helpers.setAutoUpdate(!0),
            window.Helpers.initPasswordToggle(),
            window.Helpers.initSpeechToText(),
            window.Helpers.initNavbarDropdownScrollbar(),
            window.addEventListener("resize", function (e) {
                window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT && document.querySelector(".search-input-wrapper") && (document.querySelector(".search-input-wrapper").classList.add("d-none"),
                    document.querySelector(".search-input").value = ""),
                    document.querySelector("[data-template^='horizontal-menu']") && setTimeout(function () {
                        window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT ? document.getElementById("layout-menu") && document.getElementById("layout-menu").classList.contains("menu-horizontal") && menu.switchMenu("vertical") : document.getElementById("layout-menu") && document.getElementById("layout-menu").classList.contains("menu-vertical") && menu.switchMenu("horizontal")
                    }, 100)
            }, !0),
            !isHorizontalLayout && !window.Helpers.isSmallScreen() && ("undefined" != typeof TemplateCustomizer && window.templateCustomizer.settings.defaultMenuCollapsed && window.Helpers.setCollapsed(!0, !1),
                "undefined" != typeof config) && config.enableMenuLocalStorage)
            try {
                null !== localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") && "false" !== localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") && window.Helpers.setCollapsed("true" === localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed"), !1)
            } catch (e) { }
    }()

function proPicURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = $(input).parents('.thumb').find('.profilePicPreview');
            $(preview).css('background-image', 'url(' + e.target.result + ')');
            $(preview).addClass('has-image');
            $(preview).hide();
            $(preview).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(".profilePicUpload").on('change', function () {
    proPicURL(this);
});

$(".remove-image").on('click', function () {
    $(this).parents(".profilePicPreview").css('background-image', 'none');
    $(this).parents(".profilePicPreview").removeClass('has-image');
    $(this).parents(".thumb").find('input[type=file]').val('');
});

var tr_elements = $('.custom-data-table tbody tr');

$(document).on('input', '[name=search_table]', function () {
    var search = $(this).val().toUpperCase();
    var match = tr_elements.filter(function (idx, elem) {
        return $(elem).text().trim().toUpperCase().indexOf(search) >= 0 ? elem : null;
    }).sort();
    var table_content = $('.custom-data-table tbody');
    if (match.length == 0) {
        table_content.html('<tr><td colspan="100%" class="text-center">No data found</td></tr>');
    } else {
        table_content.html(match);
    }
});

$('.navbar-search-field').on('input', function () {
    var search = $(this).val().toLowerCase();
    var search_result_pane = $('.search-list');
    $(search_result_pane).html('');
    if (search.length == 0) {
        $('.search-list').addClass('d-none');
        return;
    }
    $('.search-list').removeClass('d-none');

    // search
    var match = $('.menu-inner .menu-link').filter(function (idx, elem) {
        return $(elem).text().trim().toLowerCase().indexOf(search) >= 0 ? elem : null;
    }).sort();

    // search not found
    if (match.length == 0) {
        $(search_result_pane).append('<li class="text-muted pl-5">No search result found.</li>');
        return;
    }

    // search found
    match.each(function (idx, elem) {
        var parent = $(elem).parents('.menu-item').find('.menu-toggle').find('.text-truncate').first().text();
        if (!parent) {
            parent = `Main Menu`
        }
        parent = `<small class="d-block">${parent}</small>`
        var item_url = $(elem).attr('href') || $(elem).data('default-url');
        var item_text = $(elem).text().replace(/(\d+)/g, '').trim();
        $(search_result_pane).append(`
            <li>
            ${parent}
            <a href="${item_url}" class="fw-bold text-color--3 d-block">${item_text}</a>
            </li>
        `);
    });
});

var len = 0;
var clickLink = 0;
var search = null;
var process = false;
$('#searchInput').on('keydown', function (e) {
    var length = $('.search-list li').length;
    if (search != $(this).val() && process) {
        len = 0;
        clickLink = 0;
        $(`.search-list li:eq(${len}) a`).focus();
        $(`#searchInput`).focus();
    }
    //Down
    if (e.keyCode == 40 && length) {
        process = true;
        var contra = false;
        if (len < clickLink && clickLink < length) {
            len += 2;
        }
        $(`.search-list li[class="active"]`).removeClass('active');
        $(`.search-list li a[class="text--white"]`).removeClass('text--white');
        $(`.search-list li:eq(${len}) a`).focus().addClass('text--white');
        $(`.search-list li:eq(${len})`).addClass('active');
        $(`#searchInput`).focus();
        clickLink = len;
        if (!$(`.search-list li:eq(${clickLink}) a`).length) {
            $(`.search-list li:eq(${len})`).addClass('text--white');
        }
        len += 1;
        if (length == Math.abs(clickLink)) {
            len = 0;
        }
    }
    //Up
    else if (e.keyCode == 38 && length) {
        process = true;
        if (len > clickLink && len != 0) {
            len -= 2;
        }
        $(`.search-list li[class="active"]`).removeClass('active');
        $(`.search-list li a[class="text--white"]`).removeClass('text--white');
        $(`.search-list li:eq(${len}) a`).focus().addClass('text--white');
        $(`.search-list li:eq(${len})`).addClass('active');
        $(`#searchInput`).focus();
        clickLink = len;
        if (!$(`.search-list li:eq(${clickLink}) a`).length) {
            $(`.search-list li:eq(${len})`).addClass('text--white');
        }
        len -= 1;
        if (length == Math.abs(clickLink)) {
            len = 0;
        }
    }
    //Enter
    else if (e.keyCode == 13) {
        e.preventDefault();
        if ($(`.search-list li:eq(${clickLink}) a`).length && process) {
            $(`.search-list li:eq(${clickLink}) a`)[0].click();
        }
    }
    //Retry
    else if (e.keyCode == 8) {
        len = 0;
        clickLink = 0;
        $(`.search-list li:eq(${len}) a`).focus();
        $(`#searchInput`).focus();
    }
    search = $(this).val();
});

$(window).resize(function () {
    if ($(window).width() < 576) {
        $('.navbar-search').addClass('d-none');
    } else {
        $('.navbar-search').removeClass('d-none');
    }
});
if ($(window).width() < 576) {
    $('.navbar-search').addClass('d-none');
    $('.navbar-search-btn').on('click', function () {
        $('.navbar-search').toggleClass('d-none');
    });
} else {
    $('.navbar-search').removeClass('d-none');
}

Array.from(document.querySelectorAll('table')).forEach(table => {
    let heading = table.querySelectorAll('thead tr th');
    Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
        Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
            colum.setAttribute('data-label', heading[i].innerText)
        });
    });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title], [data-title], [data-bs-title]'))
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});
