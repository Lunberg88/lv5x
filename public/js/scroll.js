$(function() {
    "use strict";

    function e() {
        s = a.scrollTop(), s >= 100 ? o.addClass("nav-sticky") : o.removeClass("nav-sticky"), s >= 1e3 ? $(".scroll-up").addClass("show-up-btn") : $(".scroll-up").removeClass("show-up-btn")
    }

    function t() {
        s = a.scrollTop(), $.each(i, function(e, t) {
            var a = $(this),
                i = a.offset().top - l,
                n = i + a.height();
            if (s >= i && n >= s) {
                var r = o.find("ul li a");
                $.each(r, function(e, t) {
                    var a = $(this);
                    a.removeClass("active")
                }), o.find('ul [href="#' + a.attr("id") + '"]').addClass("active")
            }
        })
    }
    var a = $(window),
        s = a.scrollTop(),
        o = $(".nav-wrapper"),
        a = $(window);
    a.on("load", function() {
        var e = $(".preloader-con");
        e.fadeOut("slow"), a.scrollTop(0)
    }), $('a.scroll[href*="#"]').not('[href="#"]').not('[href="#0"]').on("click", function(e) {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var t = $(this.hash),
                a = $(this).data("speed") || 800;
            t = t.length ? t : $("[name=" + this.hash.slice(1) + "]"), t.length && (e.preventDefault(), $("html, body").animate({
                scrollTop: t.offset().top
            }, a))
        }
    });

    var i = $("section"),
        l = o.height();
    a.on("scroll", function() {
        e(), t()
    });
    var n = $(".portfolio-item-con"),
        r = $("#work-list"),
        c = $(".filter"),
        f = function(e) {
            var t = $(this);
            if (e.preventDefault(), t.hasClass("filter-active")) return !1;
            var a = r.find(".filter-active");
            a.parent("li").removeClass("active-item"), a.removeClass("filter-active"), t.addClass("filter-active"), t.parent("li").addClass("active-item"), $.each(n, function(e, a) {
                var s = $(this);
                "all" === t.data("filter") ? (s.removeClass("filtered"), setTimeout(function() {
                    s.css("display", "block")
                }, 500)) : s.hasClass(t.data("filter")) ? (s.removeClass("filtered"), setTimeout(function() {
                    s.css("display", "block")
                }, 500)) : (s.addClass("filtered"), setTimeout(function() {
                    s.css("display", "none")
                }, 500))
            })
        };
    $.each(c, function(e, t) {
        $(this).on("click", f)
    });
});