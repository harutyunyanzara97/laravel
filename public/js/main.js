
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

    $(function () {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
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
$(document).on('click', '.follow', function (event) {
    let followMe = $(this);
    event.preventDefault();
    if ($(this).find('span.following-user').text() === 'Following') {
        $(this).find('span.following-user').hide();
        $(this).find('span.unfollow-user').show();
        $(this).find('span.unfollow-user').text('Follow')
        $(this).find('span.following-user').text('Follow')
        let unfollow = $(this);
        let followId = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: '/unfollow',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followId},
            success: function (r) {
                // unfollow.html('Follow');
                if (unfollow.text() === 'Follow') {
                    unfollow.removeClass('following').addClass('follow');
                }
            }

        })
    } else {
        $(this).find('span.following-user').hide();
        $(this).find('span.unfollow-user').show();
        $(this).find('span.unfollow-user').text('Following')
        let idd = $(this).attr('data-id');
        $.ajax({
            type: "get",
            url: '/insert',
            data: {_token: $('meta[name="csrf-token"]').attr('content'), id: idd},
            success: function (r) {
                // followMe.html('Following');
                console.log(followMe.text());
                if (followMe.text() === 'Following') {
                    followMe.removeClass('follow').addClass('following');
                }
            }

        })
    }
})
$('#payment-submit').click(function () {
    let form = $('#payment-form');
    let formdata = new FormData(form[0]);
    let card = '';
    // if($('input[type=radio]').is(":checked")){
    //     cat_id = $('input[type=radio]').data('card_id');
    // }
    $('input[type=radio]').each(function(){
        if($(this).is(':checked')){
            card = $(this).prev().val();
        }
    })
    formdata.append('card',card);
    console.log(card);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data)
        {

        },
        error: function (err) {
            if (err.status == 422) {
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span class="error-valid" style="color: red;">' + error[0] + '</span>'));
                });
            }
        },
    });
});
$(document).on('click', '.following', function (event) {
    event.preventDefault();
    let unfollow = $(this);
    let followId = $(this).attr('data-id');
    $.ajax({
        type: "get",
        url: '/unfollow',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followId},
        success: function (r) {
            unfollow.html('follow');
            if (unfollow.text() === 'Follow') {
                unfollow.removeClass('following').addClass('follow');
            }
        }

    })
})
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
$(document).on('click', '.edit-btn', function (event) {
    // event.preventDefault();
    $.ajax({
        type: "get",
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: function (r) {
            $('.profile-inner').empty();
            $('.profile-inner').append(`<form action="{{url('updateUser')}}" method="post" enctype="multipart/form-data">

    <input type="hidden" value="{{Auth::user()->id}}" name="id">
    <div class="avatar-upload">
    <div class="avatar-edit">
    <input type='file' id="imageUpload" name="photo[]">
    <label for="imageUpload"></label>
    </div>
    <div class="avatar-preview">
    <div id="imagePreview"
style="background-image: url({{asset('images/'. Auth::user()->avatar_url)}})">
    </div>
    </div>
    </div>

<button type="submit" class="edit-btn">
    Edit photo
</button>
</form>`);
        }

    })
})

$(document).on('click', '.closeModal', function (event) {
    $('#rightSideModal').hide();
})
// $('.payment-btn').on('click', function (event) {
//     event.preventDefault();
//     $.ajax({
//         url: $(this).data('path'),
//         method: "get",
//         data: {_token: $('meta[name="csrf-token"]').attr('content')},
//         success: (response) => {
//             $('#ModalInfo').modal('show');
//         }
//     })
// });
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
//# sourceURL=pen.js

// $('.payment').on('click', function (event) {
//     event.preventDefault();
//     $.ajax({
//         url: '/plans',
//         method: "get",
//         data: {_token: $('meta[name="csrf-token"]').attr('content')},
//         success: (response) => {
//             console.log(response);
//             $(".profile-right-banner").html(response);
//         }
//     })
// });
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
    $.ajax({
        type: "get",
        url: '/unfollowPost',
        data: {_token: $('meta[name="csrf-token"]').attr('content'), id: followeId},
        success: function (r) {
            unfollow.html('follow');
            if (unfollow.text = 'post-following') {
                unfollow.removeClass('followedPost').addClass('post-following');
            }
        }

    })
})
// // Create a Stripe client.
// var stripe = Stripe('pk_test_51IDT1rLV6S2YaGRAadUEI9mxO2j2wbfh5Jc69TSDKj7Cdo1sxfpn1XNyPJdmIPS0axoc3VyAWiC3y5QkSDlIuLnF00sP8sZ7Ge');
// console.log(stripe);
// // Create an instance of Elements.
// var elements = stripe.elements();
// // Custom styling can be passed to options when creating an Element.
// // (Note that this demo uses a wider set of styles than the guide below.)
// var style = {
//     base: {
//         color: '#32325d',
//         lineHeight: '18px',
//         fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
//         fontSmoothing: 'antialiased',
//         fontSize: '16px',
//         '::placeholder': {
//             color: '#aab7c4'
//         }
//     },
//     invalid: {
//         color: '#fa755a',
//         iconColor: '#fa755a'
//     }
// };
// var card = elements.create('card', {style: style});
// // Add an instance of the card Element into the `card-element` <div>.
// card.mount('#card-element');
// // Handle real-time validation errors from the card Element.
// card.addEventListener('change', function (event) {
//     var displayError = document.getElementById('card-errors');
//     if (event.error) {
//         displayError.textContent = event.error.message;
//     } else {
//         displayError.textContent = '';
//     }
// });
// // Handle form submission.
// var form = document.getElementById('payment-form');
// form.addEventListener('submit', function (event) {
//     event.preventDefault();
//     stripe.createToken(card).then(function (result) {
//         if (result.error) {
//             // Inform the user if there was an error.
//             var errorElement = document.getElementById('card-errors');
//             errorElement.textContent = result.error.message;
//         } else {
//             // Send the token to your server.
//             stripeTokenHandler(result.token);
//         }
//     });
// });
//
// // Submit the form with the token ID.
// function stripeTokenHandler(token) {
//     // Insert the token ID into the form so it gets submitted to the server
//     var form = document.getElementById('payment-form');
//     var hiddenInput = document.createElement('input');
//     hiddenInput.setAttribute('type', 'hidden');
//     hiddenInput.setAttribute('name', 'token');
//     hiddenInput.setAttribute('value', 'token');
//     form.appendChild(hiddenInput);
//     // Submit the form
//     form.submit();
// }
// $('.cardButton').on('click', function (event) {
//     event.preventDefault();
//     $.ajax({
//         url: $(this).data('path'),
//         method: "get",
//         data: {_token: $('meta[name="csrf-token"]').attr('content')},
//         success: (response) => {
//             console.log(response);
//             $('#ModalInfo div.modal-body').html(response);
//         }
//     })
// });
//
// $(document).ready(function(){
//
//     // Create a Stripe client
//     var stripe = Stripe('pk_test_A45s2laXHrCRj6Tow44dk67z');
//
//     // Create an instance of Elements
//     var elements = stripe.elements();
//
//     // Try to match bootstrap 4 styling
//     var style = {
//         base: {
//             'lineHeight': '1.35',
//             'fontSize': '1.11rem',
//             'color': '#495057',
//             'fontFamily': 'apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
//         }
//     };
//
//     // Card number
//     var card = elements.create('cardNumber', {
//         'placeholder': '',
//         'style': style
//     });
//     card.mount('#card-number');
//
//     // CVC
//     var cvc = elements.create('cardCvc', {
//         'placeholder': '',
//         'style': style
//     });
//     cvc.mount('#card-cvc');
//
//     // Card number
//     var exp = elements.create('cardExpiry', {
//         'placeholder': '',
//         'style': style
//     });
//     exp.mount('#card-exp');
//
//     // Submit
//     $('#payment-submit').on('click', function(e){
//         e.preventDefault();
//         var cardData = {
//             'name': $('#name').val()
//         };
//         stripe.createToken(card, cardData).then(function(result) {
//             console.log(result);
//             if(result.error && result.error.message){
//                 alert(result.error.message);
//             }else{
//                 alert(result.token.id);
//             }
//         });
//     });
//
// });

