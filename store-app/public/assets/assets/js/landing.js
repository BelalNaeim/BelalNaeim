(function ($) {
    "use strict";
$('.demo-imgs .hover-link .html').on('click', function () {
    // debugger
    var type = $(this).attr("data-attr");
    var boxed = "";
    console.log(type)
    if ($(".page-wrapper").hasClass("landing-page")) {
        boxed = "landing-page";
    }
    
    switch (type) {
        case 'default-body':
        {
            $(".page-wrapper").attr("class", "page-wrapper only-body" + boxed);
            localStorage.setItem('page-wrapper', 'only-body');
            break;
        }

        case 'compact-wrap':
        {
            $(".page-wrapper").attr("class", "page-wrapper compact-sidebar" + boxed);
            localStorage.setItem('page-wrapper', 'compact-sidebar');
            break;
        }

        case 'box-layout':
        {
            $(".page-wrapper").attr("class", "page-wrapper compact-wrapper box-layout " + boxed);
            localStorage.setItem('page-wrapper', 'compact-wrapper box-layout');
            break;
        }

        case 'default':
        {
            $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
            localStorage.setItem('page-wrapper', 'compact-wrapper');
            break;
        }

        default:
        {
            $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
            localStorage.setItem('page-wrapper', 'compact-wrapper');
            break;
        }
    } 
    window.open('http://admin.pixelstrap.com/Tivo/theme/index.html', '_blank');
});

    $('.prooduct-details-box .close').on('click', function (e) {
        var order_details = $(this).closest('[class*=" col-"]').addClass('d-none');
    })
   })(jQuery);