
$(document).ready(function() {
    // ------------------------------------------------------- //
    // Multi Level dropdowns
    // ------------------------------------------------------ //
    $("ul.dropdown-menu .dropdown-toggle").on("mouseover", function(event) {
        // event.preventDefault();
        // event.stopPropagation();

        $(this).siblings().toggleClass("show");

        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

    });
    /*
        $(".dropdown-submenu").on("mouseover", function(event) {
            // event.preventDefault();
            // event.stopPropagation();
            $(this).children('ul').first().show();
        });*/
});
