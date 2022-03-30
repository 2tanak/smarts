import 'bootstrap-sass/assets/javascripts/bootstrap';
import Swiper from 'swiper/js/swiper.min';
var SimpleLightbox = require('simple-lightbox');

new SimpleLightbox({
    elements: '.imageGallery a'
});

// Select2 script
// ===============================================================

$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})

function formatState(state) {
    let img = state.element.dataset.img
    if (!img || img == undefined || img == '') {
        return state.text;
    }
    // var baseUrl = "/images/flags";
    var $state = $(
        '<span><img src="' + img +  '" class="img-flag" style="margin-right: 5px; margin-left: 5px; height:20px;" /> ' + state.text + '</span>'
    );
    return $state;
};

function formatStateList (state) {
    let img = $(state.element).attr('data-img')
    if (!img || img == undefined || img == '') {
        return state.text;
    }
    // var baseUrl = "/images/flags";
    var $state = $(
        '<span><img src="' + img + '" class="img-flag" style="margin-right: 5px; margin-left: 5px; height:20px;" /> ' + state.text + '</span>'
    );
    return $state;
};

$(".js_flag_select").select2({
    templateSelection: formatState,
    templateResult: formatStateList,
    minimumResultsForSearch: Infinity,
    width: '100%'
});

// Accardion script
// ===============================================================
$('.accardion_element h3').click(function () {
    if ($(this).parent().hasClass('active')) {
        $(this).siblings().slideToggle('slow');
        $('.accardion_element').removeClass('active');
    } else {
        $('.accardion_element div').slideUp('slow');
        $(this).siblings().slideDown('slow');

        $('.accardion_element').removeClass('active');
        $(this).parent().addClass('active');
    }
});


// Slider script
// ===============================================================

new Swiper('.swiper-container', {
    slidesPerView: 1.1,
    spaceBetween: 15,
    freeMode: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

new Swiper('.swiper-profile', {
    slidesPerView: 2.2,
    spaceBetween: 20,
    freeMode: true,
});


// Open-Close script
// ===============================================================

$('.js_burger').click(() => {
    $('.sidebar-menu').addClass('active');
    $('body').addClass('hidden');
})

$('.js_close-menu').click(() => {
    $('.sidebar-menu').removeClass('active');
    $('body').removeClass('hidden');
})

$('.js-open-filter').click(function () {
    $(this).toggleClass('open')
    $('.filter').slideToggle('slow')
})


$('.js_manager').click(() => {
    $('.manager-block').addClass('open');
    $('body').addClass('hidden');
})

$('.js_close').click(() => {
    $('.open').removeClass('open');
    $('body').removeClass('hidden');
})


$('.js_footer-all').click(function () {
    $(this).parent().removeClass('hidden');
})



// view page scroll animation script
// ===============================================================

// $(window).scroll(() => {
//     if($(window).scrollTop() > 80){
//         $('.view-header').addClass('scroll')
//         $('.global-tabs').addClass('fixed')
//     }else{
//         $('.view-header').removeClass('scroll')
//         $('.global-tabs').removeClass('fixed')
//     }
// })




// Add hidden __content script
// ===============================================================

$('.__text').map(function (e) {
    if (($(this)[0]).clientHeight > 150) {
        $($(this)[0]).parent().parent().addClass('hidden')
    }
})




// Scroll top script
// ===============================================================


$("a.scrollto").click(function () {
    var elementClick = $(this).attr("href")
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({
        scrollTop: destination
    }, 800);
    return false;
});

$(window).scroll(() => {
    if ($(window).scrollTop() > 400) {
        $('.button-top').addClass('open')
    } else {
        $('.button-top').removeClass('open')
    }
})

$('body').on('click', '.showPass', function () {
    if ($(this).is(':checked')) {
        $('.pass').attr('type', 'text');
    } else {
        $('.pass').attr('type', 'password');
    }
});

if ($('.univerProgram').length) {
    $('.univerProgramItem').each(function (i, item) {
        let minHeight = $(item).find($('.univerProgramItemHeader')).innerHeight();
        let maxHeight = $(item).find($('.univerProgramItemContent')).innerHeight();
        $(item).css('height', minHeight);
        console.log(minHeight)

        $(item).find($('.univerProgramItemHeader')).click(function () {
            if ($(this).parent().parent().hasClass('show')) {
                $(this).parent().parent().animate({
                    height: minHeight
                }, 100);
                $(this).parent().parent().removeClass('show');
            } else {
                $('.univerProgramItem.show').animate({
                    height: minHeight
                }, 100);
                $('.univerProgramItem.show').removeClass('show');
                $(this).parent().parent().animate({
                    height: maxHeight
                }, 100);
                $(this).parent().parent().addClass('show');
            }
        });
    })
    // let minHeight = $('.univerProgramItemHeader').innerHeight();
    // let maxHeight = $('.univerProgramItemContent').innerHeight();
    // $('.univerProgramItem').css('height', minHeight);

    // $('.univerProgramItemHeader').click(function () {
    //     if ($(this).parent().parent().hasClass('show')) {
    //         $(this).parent().parent().animate({
    //             height: minHeight
    //         }, 100);
    //         $(this).parent().parent().removeClass('show');
    //     } else {
    //         $('.univerProgramItem.show').animate({
    //             height: minHeight
    //         }, 100);
    //         $('.univerProgramItem.show').removeClass('show');
    //         $(this).parent().parent().animate({
    //             height: maxHeight
    //         }, 100);
    //         $(this).parent().parent().addClass('show');
    //     }
    // });

    const container = document.querySelector('.__more')

    container.addEventListener('click', function (e) {
        console.log('hello')
        const items = document.querySelectorAll('.univerProgramItem')
        const target = e.target
        Array.from(items).forEach(item => {
            item.classList.remove('active')
        })
        target.classList.add('active')
    })

    $('.popup-modal').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name'
    });
}
