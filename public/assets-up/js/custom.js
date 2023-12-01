$(document).ready(function () {
    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");
    $('[href="#"]').attr("href", "javascript:;");
    $('.menu-Bar').click(function () {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
    });

    $('.loginUp').click(function () {
        $('.overlay').fadeIn();
        $('.loginpopup-waper').fadeIn();
    });

    $('.signUp').click(function () {
        $('.overlay').fadeIn();
        $('.signUppopup-waper').fadeIn();
    });

    $('.closePop, .overlay').click(function () {
        $('.loginpopup-waper').fadeOut();
        $('.signUppopup-waper').fadeOut();
        $('.overlay').fadeOut();
    });

});

$(document).on('click', '.acPassword button', function () {
    var x = $(this).siblings(input).attr('type');
    console.log(x, "INput Type")
})


// Select all links with hashes
$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 70
                }, 500, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

// Navigation Menu
$(window).on('load', function () {
    var currentUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
    $('ul.menu li a').each(function () {
        var hrefVal = $(this).attr('href');
        if (hrefVal == currentUrl) {
            $(this).removeClass('active');
            $(this).closest('li').addClass('active')
            $('ul.menu li.first').removeClass('active');
        }
    });
});

// Tabbing JS
$('[data-targetit]').on('click', function (e) {
    $(this).addClass('current');
    $(this).siblings().removeClass('current');
    var target = $(this).data('targetit');
    $('.' + target).siblings('[class^="box-"]').hide();
    $('.' + target).fadeIn();
    //   $(".tab-slider").slick("setPosition");
});

/* RESPONSIVE JS */
if ($(window).width() < 1280) {
    $('.menu li i').on('click', function () {
        $('.dropdown').removeClass('open');
        // $(this).siblings('.dropdown').addClass('open');
        if ($(this).hasClass('fa-caret-up')) {
            $(this).removeClass('fa-caret-up');
            $(this).addClass('fa-caret-down');
            $('.dropdown').removeClass('open');
        } else if ($(this).hasClass('fa-caret-down')) {
            $(this).addClass('fa-caret-up');
            $(this).removeClass('fa-caret-down');
            $(this).siblings('.dropdown').addClass('open');
        }

    });
}
if ($(window).width() < 1200) {
    $('.packageSec-main .row').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
}



























































$(document).ready(function () {
    $('.input-daterange').datepicker({
        format: 'yyyy-mm-dd'
    });
});

var getDateArray = function (start, end) {
    var arr = new Array();
    var dt = new Date(start);

    while (dt <= end) {
        arr.push(new Date(dt));
        dt.setDate(dt.getDate() + 1);
    }

    for (var i = 0; i < arr.length; i++) {
        var month = ((arr[i].getMonth() + 1) < 10 ? '0' : '') + (arr[i].getMonth() + 1);
        var year = arr[i].getFullYear();
        var day = (arr[i].getDate() < 10 ? '0' : '') + arr[i].getDate();
        var history_arr = year + '.' + month + '.' + day;
        var history_arr0 = 'date-' + history_arr.toString();
        //alert(history_arr0);
        //$(history_arr0).show();

        $('tr.date-history-func').each(function (i, obj) {
            var id = $(this).attr('id');
            if (id == history_arr0) { $(this).show(); }
        });


    }
}

function showhistory(account_id) {
    var startDate1 = new Date($('input#startDate1-' + account_id).val());
    var endDate1 = new Date($('input#endDate1-' + account_id).val());
    $('.date-history-func').hide();

    getDateArray(startDate1, endDate1);
}

function export_history(account_id) {
    var startDate1 = new Date($('input#startDate1-' + account_id).val());
    var endDate1 = new Date($('input#endDate1-' + account_id).val());

}

function ResetHistory() {
    $('div.input-daterange input.form-control').val('');
    var startDate1 = '';
    var endDate1 = '';
    $('.date-history-func').hide();
    getDateArray(startDate1, endDate1);
}

function SelectSender(sender) {
    $('select#select-sender').val(sender)
}

function confirmDelete() {
    var result = confirm("Are you sure that you want to delete this account? You can't undo this!");
    if (result) {
        return true;
    } else {
        return false;
    }
}

function VolumeType(val) {
    if (val == 0) {
        $('#volume-percent').addClass('hidden');
        $('#volume-percent-msg').addClass('hidden');
        $('#volume-fixed').removeClass('hidden');
        $('#volume-fixed').attr('required', '');
        $('#volume-percent').removeAttr('required');
    } else if (val == 1) {
        $('#volume-percent').removeClass('hidden');
        $('#volume-percent-msg').removeClass('hidden');
        $('#volume-fixed').addClass('hidden');
        $('#volume-percent').attr('required', '');
        $('#volume-fixed').removeAttr('required');
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function count_all_volume() {
    $('table tbody tr.tr_details').each(function () {

        var account_id_list = $(this).find('td.account_id_list').text();
        $('div#history' + account_id_list).each(function () {

            $(this).find('table tbody tr.date-history-func').each(function () {
                variable00 = $(this).find('td.volume_list').text();
                type = $(this).find('td.type_list').text();
                document.cookie = "order_type=" + type;
                document.cookie = "volume_cookie=" + variable00;
                if (getCookie('order_type') == 'buy' || getCookie('order_type') == 'sell') {
                    $('table tbody tr.tr_details td#account_' + account_id_list + ':first').next('td#total_volume').text(parseFloat($('table tbody tr.tr_details td#account_' + account_id_list + ':first').next('td#total_volume').text()) + parseFloat(getCookie('volume_cookie')));
                }
            });
        });
    });
}
setTimeout(count_all_volume, 5000);

$(document).on("click", 'a.buyPackage', function() {
    if($(this).hasClass('selectbtn')){
        console.log("Yes")
        $('.pakageCard').removeClass("selectPackage");
        $('.buyPackage').removeClass("selectbtn");
        $(".buyPackage").text("Buy Package");
        $("#account_group").val("");
        $('#account_group option[value=""]').attr('selected', 'selected');
    }else{
        console.log("no")
        $('.pakageCard').removeClass("selectPackage");
        $('.buyPackage').removeClass("selectbtn");
        $(".buyPackage").text("Buy Package");

        $(this).closest('.pakageCard').addClass("selectPackage")
        $(this).text("This Package is Selected");
        $(this).addClass("selectbtn");
        $("#account_group").val($(this).attr('val'));
        $('#account_group option[value=' + $(this).attr('val') + ']').attr('selected', 'selected');
    }

});

function accountGroup() {
    var accountgroup = $("#account_group").val();
    $('a.btn-success[val=' + accountgroup + ']').click();
}



// LIVE ACCOUNT


