$(document).ready(function(){



    // hide/show password
    $('.js-s-h-pass').click(function (e) {
        console.log(this)
        console.log(e.target);

        console.log($(this).siblings('.js-password'));
        let input_password = $(this).siblings('.js-password');
        let type = input_password.attr('type') == "text" ? "password" : 'text',
            c = $(this).html() =='<i class="fa fa-eye-slash" aria-hidden="true"></i>' ? '<i class="fa fa-eye" aria-hidden="true"></i>' : '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        $(this).html(c);
        input_password.prop('type', type);
    });



    //slider script
    let a = $('.product-item').length;
    let i = 1;
    let interval;
    let start = null;
    let globalID;


    function step(timestamp) {

        if (!start) start = timestamp;
        var progress = timestamp - start;

        if (progress > 5777) {
            t();
            start = timestamp
        }
        globalID = window.requestAnimationFrame(step);
    }
    globalID = requestAnimationFrame(step);
    function remove() {
        $('.product--active').removeClass('product--active').fadeOut(500);
        $('.active__dot').removeClass('active__dot');
        $('.title__active').removeClass('title__active');
        $('.slider__more--active').removeClass('slider__more--active');
    }
    function add() {
        $('.product-item:nth-child(' + i + ')').addClass('product--active').fadeIn(500);
        $('li:nth-child(' + i + ')  a .dots__item').addClass('active__dot');
        $('.slider__title:nth-child(' + i + ')').addClass('title__active');
        $('.slider__more:nth-child(' + i + ')').addClass('slider__more--active');
    }
    function t() {
        if ( i == a) {
            i = 0;
        }
        remove();
        ++i;
        add();
    }
    $('.dots__item').click(function (event) {
        console.log(event.currentTarget.id);
        let slideNum = event.currentTarget.id;
        switch (slideNum) {
            case 'slide1':
               remove();
                i = 1;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide2':
                remove();
                i = 2;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide3':
                remove();
                i = 3;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide4':
                remove();
                i = 4;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide5':
                remove();
                i = 5;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide6':
                remove();
                i = 6;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide7':
                remove();
                i = 7;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide8':
                remove();
                i = 8;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide9':
                remove();
                i = 9;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
            case 'slide10':
                remove();
                i = 10;
                add();
                cancelAnimationFrame(globalID);
                globalID = requestAnimationFrame(step);
                break;
        }
    })
// end slider ---------------


    //textarea area
    $('body').click(function () {
        if ($("#query").is(":focus")) {

        }else {
            $("#query").attr('style', '');
        }
    });
    // end textarea----------------------------------------

    $('#user_button').click(function(event) {
        event.preventDefault();
        $('.form-popup__enter').css({"display":"block"});
        $('.form-popup__registration').css({"display":"none"});
        $('.form-popup__forgot-password').css({"display":"none"});
        $('.register-complete').css({"display":"none"});
    });

    $('.register__link').click(function(event) {
        event.preventDefault();
        $('.form-popup__enter').css({"display":"none"});
        $('.form-popup__registration').css({"display":"block"});
        $('.form-popup__forgot-password').css({"display":"none"});

    });

    $('.forgot-pass__link').click(function(event) {
        event.preventDefault();
        $('.form-popup__enter').css({"display":"none"});
        $('.form-popup__registration').css({"display":"none"});
        $('.form-popup__forgot-password').css({"display":"block"});
    });

});


const treeState = JSON.parse(localStorage.getItem('treeState')) || {};

for (let key in treeState){
    if(treeState[key]){
        $('[data-id='+key+']').children("ul").slideUp();
        $('[data-id='+key+']').children("i").addClass('fa-plus-square');
    }else {
        $('[data-id='+key+']').children("ul").slideDown();
        $('[data-id='+key+']').children("i").removeClass('fa-plus-square');
    }
}
$('.js-category-title-for-tree').click(function(event) {
    const group = $(event.target).data('group').split(',') || [];
    const localTree = {};
    group.forEach(item=>{
        localTree[item] = false;
    });
    localStorage.setItem('treeState', JSON.stringify(localTree));
});

$('.js-tree-item').click(function(event) {
    const element = $(event.target).closest('li');

    if (element.find('ul').length === 0) return true;

    event.preventDefault();
    element.children("ul").slideToggle();
    element.children("i").toggleClass('fa-plus-square');
    const id = element.data("id");

    const is_hidden = element.children("i").hasClass('fa-plus-square');
    treeState[id] = is_hidden;

    localStorage.setItem('treeState', JSON.stringify(treeState));
});


// Шестерня для конфігурації товару
$('.gear').click(function(e){
    if ($(this).hasClass('js-add-to-zip-gear')){
        let button = $('.js-gear-change');
        button.addClass('js-gear-add-to-zip');
    }
    let article = $(e.target).closest('.js-product-block').find(".js-product-reference").text();
    let category = $(e.target).closest('.js-product-block').find(".js-product-category").val();
    let tex = [];
    tex = article.split('');
    let l = tex.length;

    for(let i = 0; i<= l - 1; i++) {
        if(tex[i] == '.') {
            tex[i] = '<input class="modal-content__input" type="text" maxlength="1" onkeyup="jumpFocus(this)"  required>';
        }
    }
    let hiddenArticle = '<input class="modal-content__input js-gear-article" type="hidden" value="'+ article +'">';
    let hiddenCategory = '<input class="modal-content__input js-gear-category" type="hidden" value="'+ category +'">';
    tex.join('');
    tex.push(hiddenArticle);
    tex.push(hiddenCategory);
    let modal = $('.modal-content__result');
    modal.html(tex);
    // modal.html(hiddenArticle);
});
//============================================================

//script for accordion in zip page
function closeAcc (e) {
    $("#accordion .accordion__card").removeClass('border-active');
    $(e.target).closest('.accordion__card').addClass('border-active');
}
$("#accordion .accordion__card .card__header .header-wrap__right .button-item").click(closeAcc);
$("#accordion .accordion__card .card__header .header-wrap__left .folder-item").click(closeAcc);

function closeAccArchive (e) {
    $("#accordionArchive .accordion__card").removeClass('border-active');
    $(e.target).closest('.accordion__card').addClass('border-active');
}
$("#accordionArchive .accordion__card .card__header .folder-item").click(closeAccArchive);


//script for switch select in checkout page
$(document).ready(function () {
    $('#delivery__radiobutton1').click(function () {
        $('#second').slideUp('fast');
        $('#first').slideDown('fast');
        $('#third').slideUp('fast');
        $('#four').slideUp('fast');
    });
    $('#delivery__radiobutton2').click(function () {
        $('#first').slideUp('fast');
        $('#second').slideDown('fast');
        $('#third').slideDown('fast');
        $('#four').slideDown('fast'); 
    });

});

//script for accordion in order-history page
function close_orderAccord (e) {
    $("#order_accordion .accordion__items").removeClass('border-active');
    $(e.target).closest('.accordion__items').addClass('border-active');
}
$("#order_accordion .accordion__items .items__head .head_btn").click(close_orderAccord);

//script for search button
$('.js-textarea').focusout(function() {
    if ($(this).val().trim() !== '') {
        $(this).addClass('has-text');
    } else {
        $(this).removeClass('has-text');
    }
});



$('.play__button'). click(function () {
    document._video = document.getElementById('video__player');
    document._video.play();
    $('.play__button').css('display', 'none');
    console.log('play');
});


$('.responsive').slick({
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
    prevArrow: '<i class="fas fa-chevron-left icon-back"></i>',

    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        },
        {
            breakpoint: 375,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

//input switch on the page checkout
$(document).ready(function(){
    $(".delivery-input__link").click(function(){
        console.log('CHANGE');
        $(".js_deliv").toggleClass('js_delivery_block__global');
    });
});
$('#js_basket').click(function (e) {
    e.preventDefault();
    console.log('Click');
    VueApp.$refs.cart.showCart();
})
$('.js-buy').click(function (e) {
    e.preventDefault();
    console.log('Click');
    VueApp.$refs.cart.showCart();
});

//toggle for mobile catalog
$('#button__filter').click(function(e){
    event.preventDefault();
    $('.treeview-wrap').toggle(200)
})

//toggle for user cabinet
$('#button__user-profile').click(function(e){
    event.preventDefault();
    $('.user-profile__account').toggle(200)
})

//slick for mobile

$('.slick__mobile').slick({
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
    prevArrow: '<i class="fas fa-chevron-left icon-back"></i>',

    responsive: [
        {
            breakpoint: 3840,
            settings: "unslick"
        },
        {
            breakpoint: 2048,
            settings: "unslick"
        },
        {
            breakpoint: 1920,
            settings: "unslick"
        },
        {
            breakpoint: 1440,
            settings: "unslick"
        },
        {
            breakpoint: 1024,
            settings: "unslick"
        },
        {
            breakpoint: 768,
            settings: "unslick"
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                nextArrow: '<i class="fas fa-chevron-right icon-next"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        },
        {
            breakpoint: 375,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                nextArrow: '<i class="fas fa-chevron-right"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        },
        {
            breakpoint: 325,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                nextArrow: '<i class="fas fa-chevron-right"></i>',
                prevArrow: '<i class="fas fa-chevron-left icon-back"></i>'
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

//оптимизация картинок, ленивая загрузка
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazyImage"
});
window.jumpFocus = function(e) {
    console.log('jump');
    let max = ~~e.getAttribute('maxlength');
    if (max && e.value.length >= max) {
        do {
            e = e.nextSibling;
        }
        while (e && !(/text/.test(e.type)));
        if (e && /text/.test(e.type)) {
            e.focus();
        }
    }
}


//hide show password in user cabinet

$('#js-password-toggle').click(function () {
    let block = document.querySelector('.password__wrap');
    block.classList.toggle('active');
});

let frm = document.getElementById("header__search");
frm.onkeyup = function (e) {

    e = e || window.event;
    if (e.keyCode === 13) {
        $('.load-header').css('display','block');
        frm.submit();
    }
    // Отменяем действие браузера
    return false;
}

//script for preloader on button(search)
$('.search__button').click(function () {
    $('.load-header').css('display','block');
});


$('.single-item').slick({
    autoplay: true,
    speed: 500,
    infinite: true,
    arrows: false,
    dots: true,
    fade: true
});





// fancybox for about us page

$('.js-fancybox-wrap img').each(function( elem ) {
    $(this).wrap(function() {
        return `<a href="${this.src}" data-fancybox=\"gallery\"></a>`;
    });
});