$(function() {
    var mydiv=$("#mydiv");

    var mydiv_resize=function() {
        $(mydiv).css("width",$(window).width());
        $(mydiv).css("height",$(window).height());
    };
    mydiv_resize();

    $(window).resize(function() {
        mydiv_resize();
    });
});
