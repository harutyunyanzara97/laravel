//Number.prototype.round = function (places) {
//    return +(Math.round(this + "e+" + places) + "e-" + places);
//};

$('[data-toggle=offcanvas]').click(function () {
    $('.row-offcanvas').toggleClass('active');
});

$(document).ready(function () {
    $(".custom-control-input").click(function () {
        console.log($(this).hasClass('checked'));
        if (!$(this).hasClass('checked')) {
            $(this).parent().prev().css('color', '#fdd15c');
            $(this).addClass('checked');
        } else {
            $(this).parent().prev().css('color', '#55575a');
            $(this).removeClass('checked');
        }

    });

});

//////////////////////////
$(document).ready(function () {
    $('#content-slider').lightSlider({
        item: 5,
        loop: false,
        slideMove: 2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 600,
        lspager: 2,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    item: 4,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    item: 3,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 787,
                settings: {
                    item: 2,
                    slideMove: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    item: 1,
                    slideMove: 1
                }
            }]
    });
})


///////////////////////////

$(".custom-select").each(function () {
    var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
    var template = '<div class="' + classes + '">';
    template +=
        '<span class="custom-select-trigger">' +
        $(this).attr("placeholder") +
        "</span>";
    template += '<div class="custom-options">';
    $(this)
        .find("option")
        .each(function () {
            template +=
                '<span class="custom-option ' +
                $(this).attr("class") +
                '" data-value="' +
                $(this).attr("value") +
                '">' +
                $(this).html() +
                "</span>";
        });
    template += "</div></div>";

    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(
    function () {
        $(this)
            .parents(".custom-options")
            .addClass("option-hover");
    },
    function () {
        $(this)
            .parents(".custom-options")
            .removeClass("option-hover");
    }
);
$(".custom-select-trigger").on("click", function () {
    $("html").one("click", function () {
        $(".custom-select").removeClass("opened");
    });
    $(this)
        .parents(".custom-select")
        .toggleClass("opened");
    event.stopPropagation();
});
$(".custom-option").on("click", function () {
    $(this)
        .parents(".custom-select-wrapper")
        .find("select")
        .val($(this).data("value"));
    $(this)
        .parents(".custom-options")
        .find(".custom-option")
        .removeClass("selection");
    $(this).addClass("selection");
    $(this)
        .parents(".custom-select")
        .removeClass("opened");
    $(this)
        .parents(".custom-select")
        .find(".custom-select-trigger")
        .text($(this).text());
});

//////////////////////

function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
    console.log(document.getElementById('number').value);
}
/////////////////////carouse/////////////
$(function () {
    $('#myCarousel').carousel({
        interval: false
    });
    $('#carousel-thumbs').carousel({
        interval: false
    });

// handles the carousel thumbnails
// https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr('id');
        var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
        $('#myCarousel').carousel(id);
    });
// Only display 3 items in nav on mobile.
    if ($(window).width() < 575) {
        $('#carousel-thumbs .row div:nth-child(4)').each(function () {
            var rowBoundary = $(this);
            $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
        });
        $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function () {
            var boundary = $(this);
            $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
        });
    }
// Hide slide arrows if too few items.
    if ($('#carousel-thumbs .carousel-item').length < 2) {
        $('#carousel-thumbs [class^=carousel-control-]').remove();
        $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
    }
// when the carousel slides, auto update
    $('#myCarousel').on('slide.bs.carousel', function (e) {
        var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id=carousel-selector-' + id + ']').addClass('selected');
    });
// when user swipes, go next or previous
    $('#myCarousel').swipe({
        fallbackToMouseEvents: true,
        swipeLeft: function (e) {
            $('#myCarousel').carousel('next');
        },
        swipeRight: function (e) {
            $('#myCarousel').carousel('prev');
        },
        allowPageScroll: 'vertical',
        preventDefaultEvents: false,
        threshold: 75
    });
    /*
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
     event.preventDefault();
     $(this).ekkoLightbox();
     });
     */

    $('#myCarousel .carousel-item img').on('click', function (e) {
        var src = $(e.target).attr('data-remote');
        if (src) $(this).ekkoLightbox();
    });


});


/////////////////////////


function readURL(input, id) {
    console.log(input)
    console.log(id)
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap-' + id).hide();

            $('.file-upload-image-' + id).attr('src', e.target.result);
            $('.file-upload-content-' + id).show();

            $('.image-title-' + id).html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});





///////////////rich editor//////////////////////
var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'];
var forePalette = $('.fore-palette');
var backPalette = $('.back-palette');

for (var i = 0; i < colorPalette.length; i++) {
    forePalette.append('<a href="#" data-command="forecolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
    backPalette.append('<a href="#" data-command="backcolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
}

$('.toolbar a').click(function (e) {
    var command = $(this).data('command');
    if (command == 'h1' || command == 'h2' || command == 'p') {
        document.execCommand('formatBlock', false, command);
    }
    if (command == 'forecolor' || command == 'backcolor') {
        document.execCommand($(this).data('command'), false, $(this).data('value'));
    }
    if (command == 'createlink' || command == 'insertimage') {
        url = prompt('Enter the link here: ', 'http:\/\/');
        document.execCommand($(this).data('command'), false, url);
    }
    else document.execCommand($(this).data('command'), false, null);
});



//////////////////
function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});




function readURL(input, id) {
    console.log(input)
    console.log(id)
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-upload-wrap-'+id).hide();

            $('.file-upload-image-' + id).attr('src', e.target.result);
            $('.file-upload-content-' + id).show();

            $('.image-title-'+ id).html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
