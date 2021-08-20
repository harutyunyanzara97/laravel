
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('.imagePreview').hide();
            $('.imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(".imageUpload").change(function () {
    readURL(this);
});
$('.moreless-button').click(function () {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "Read more") {
        $(this).text("Read less")
    } else {
        $(this).text("Read more")
    }
});

$('.myPosts').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/myPosts',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.myComments').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/myComments',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.comment').on('click', function (event) {
    event.preventDefault();
    let id=$(this).data('id');
    $.ajax({
        url: '/member-comments',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content'),id:id},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.posts').on('click', function (event) {
    event.preventDefault();
    let id=$(this).data('id');
    $.ajax({
        url: '/member-posts',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content'),id:id},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.my-account').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/account',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.checkPosts').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/check',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$('.myBalance').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/balance',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});

$(document).on('click', '.edit', function (event) {
    // event.preventDefault();

    let editedId = $(this).attr('data-id');
    let rightSideModal = $('#rightSideModal');
    $.ajax({
        type: "get",
        url: 'edit',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: editedId},
        success: function (r) {
            $('.modalOpen').prepend(r);
        }

    })
})
//
// $(document).on('click', '.editpost', function (event) {
//     // event.preventDefault();
//
//     let editedId = $(this).attr('data-id');
//
//     $.ajax({
//         type: "get",
//         url: '/edit-post',
//         data: {_token: $('meta[name="csrf-token"]').attr('content'), id: editedId},
//         success: function (r) {
//             console.log(r);
//             $('.modalOpen').prepend(r);
//         }
//
//     })
// })



$(document).on('click', '.closeModal', function (event) {
    $('#rightSideModal').hide();
})

$('.myAccount').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/account',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
$(document).ready(function () {
    $('.dropdown-item').on('click', function () {
        if ($(this).attr('href')) {
            // alert('redirect to ' + $(this).attr('href'));
            window.location.replace($(this).attr('href'));

        }

    });
});
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
$('.my-account').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/account',
        method: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: (response) => {
            console.log(response);
            $(".profile-right-banner").html(response);
        }
    })
});
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
}

$(document).on('click', '.post-following', function (event) {
    event.preventDefault();
    let follow = $(this);
    let toFollowId = $(this).attr('data-id');
    let post_id = $(this).attr('data-path');
    $.ajax({
        type: "get",
        url: '/followPost',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId, postId: post_id},
        success: function (r) {
            follow.html('Followed');
            if (follow.text = 'Following') {
                follow.removeClass('.member-following').addClass('followedPost');
            }
        }

    })
})
$(document).on('click', '.followedPost', function (event) {
    event.preventDefault();
    let unfollow = $(this);
    let followeId = $(this).attr('data-id');
    let post_id = $(this).attr('data-path');
    $.ajax({
        type: "get",
        url: '/unfollowPost',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followeId,post_id: post_id},
        success: function (r) {
            unfollow.html('follow');
            if (unfollow.text = 'post-following') {
                unfollow.removeClass('followedPost').addClass('post-following');
            }
        }

    })
})

$(document).on('click', '.member-following', function (event) {
    event.preventDefault();
    let follow = $(this);
    let toFollowId = $(this).attr('data-id');
    let user_id = $(this).attr('data-path');
    $.ajax({
        type: "get",
        url: '/followUser',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: toFollowId, postId: user_id},
        success: function (r) {
            follow.html('Followed');
            if (follow.text = 'Following') {
                follow.removeClass('.member-following').addClass('followed');
            }
        }

    })
})
$(document).on('click', '.followed', function (event) {
    event.preventDefault();
    let unfollow = $(this);
    let followeId = $(this).attr('data-id');
    $.ajax({
        type: "get",
        url: '/unfollowUser',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followeId},
        success: function (r) {
            unfollow.html('follow');
            if (unfollow.text = 'member-following') {
                unfollow.removeClass('followed').addClass('member-following');
            }
        }

    })
})
var __slice = [].slice;

(function($, window) {
    var Starrr;

    Starrr = (function() {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function(e, value) {}
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'i', function(e) {
                return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function() {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'i', function(e) {
                return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function() {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function(rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function(rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                }
            }
            if (!rating) {
                return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function() {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function() {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function() {
    return $(".starrr").starrr();
});

$( document ).ready(function() {

    $('#stars').on('starrr:change', function(e, value){
        $('#count').html(value);
    });

    $('#stars-existing').on('starrr:change', function(e, value){
        $('#count-existing').html(value);
    });
});
