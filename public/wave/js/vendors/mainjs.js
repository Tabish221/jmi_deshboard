
import $ from 'jquery'



$(document).ready(function () {







    $(".dropdown1").click(
        function () {
            $('.dropdown-menu1', this).stop(true, true).slideDown("slow");
            $(this).toggleClass('open1');
        },
        function () {
//$('.dropdown--menu', this).stop(true, true).slideUp("slow");
//$(this).toggleClass('open');
        }
    );

    $(".dropdown").hover(
        function () {
//$('.dropdown--menu', this).stop(true, true).slideDown("slow");
//$(this).toggleClass('open');
        },
        function () {
//$('.dropdown-menu', this).stop(true, true).slideUp("slow");
//$(this).toggleClass('open');
        }
    );





// Accordian Action
    let action = 'click';
    let speed = "500";
    $(document).ready(function(){
        // Question handler
        $('li.q').on(action, function(){
            // gets next element
            // opens .a of selected question
            $(this).next().slideToggle(speed)
                // selects all other answers and slides up any open answer
                .siblings('li.a').slideUp();
            // Grab img from clicked question
            let img = $(this).children('span');
            // remove Rotate class from all images except the active
            $('span').not(img).removeClass('rotate');
            // toggle rotate class
            img.toggleClass('rotate');
        });

    });


    let coll = document.getElementsByClassName("collapsible");
    let i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }


    $('input.search').keydown(function(){
        if(($('input.search').val().length >1)){
            $('div.search').show();
        }else{
            $('div.search').hide();
        }
    });
    $('input.search').blur(function(){
        if(($('input.search').val().length >1)){
            $('div.search').show();
        }else{
            $('div.search').hide();
        }
    });



    setInterval(function(){ $('a.slick-next').click(); }, 5000);


    let ul1_offer_height = $("#main-pricing-list ul.package-features-list1").map(function (){return $(this).height();}).get();
    let ul1_offer_maxheight = Math.max.apply(null, ul1_offer_height);
    let ul2_offer_height = $("#main-pricing-list ul.package-features-list2").map(function (){return $(this).height();}).get();
    let ul2_offer_maxheight = Math.max.apply(null, ul2_offer_height);
    let h2_offer_height = $("#main-pricing-list .package .title").map(function (){return $(this).height();}).get();
    let h2_offer_maxheight = Math.max.apply(null, h2_offer_height);
    let h4_offer_height = $("#main-pricing-list h4").map(function (){return $(this).height();}).get();
    let h4_offer_maxheight = Math.max.apply(null, h4_offer_height);
    let p_offer_height = $("#main-pricing-list p.desc").map(function (){return $(this).height();}).get();
    let p_offer_maxheight = Math.max.apply(null, p_offer_height);

    let main_column_p_title = $("#main-section-3 #main-column p.main_title").map(function (){return $(this).height();}).get();
    let main_column_p_titleul_maxheight = Math.max.apply(null, main_column_p_title);
    let main_column_p_content = $("#main-section-3 #main-column #content").map(function (){return $(this).height();}).get();
    let main_column_p_content_maxheight = Math.max.apply(null, main_column_p_content);


    $("#main-pricing-list ul.package-features-list1").css("height",ul1_offer_maxheight);
    $("#main-pricing-list ul.package-features-list2").css("height",ul2_offer_maxheight);
    $("#main-pricing-list .package *.title").css("height",h2_offer_maxheight);
    $("#main-pricing-list h4").css("height",h4_offer_maxheight);
    $("#main-pricing-list p.desc").css("height",p_offer_maxheight);
    $("#main-section-3 #main-column p.main_title").css("height",main_column_p_titleul_maxheight);
    $("#main-section-3 #main-column #content").css("height",main_column_p_content_maxheight);

    // let intt=<?PHP if(isset($_GET['myref'])){echo $_GET['myref'];}else{echo 0;} ?>;
    // if($.isNumeric(intt)){
    //     $.get("/refstore?myref="+intt, function(data, status){
    //         //
    //     });
    // }



    $('ul#myUL li').hide();
    $('ul#myUL2 li').hide();
    $('#clear_search').css('visibility', 'hidden');

    $('#header-search input').on('keyup',function(){
        let $value=$(this).val();
        if($value.length>2){
            $('#clear_search').css('visibility', 'visible');

        }
        if($value.length<3){
            $('#clear_search').css('visibility', 'hidden');

        }
        if($value.length<1)
        {
            $('ul#myUL li').hide();
        }
        $('ul#myUL li').hide();
        let value = $(this).val().toLowerCase();
        $("ul#myUL li").filter(function() {
            if($(this).text().toLowerCase().indexOf(value) > -1)
            {
                $(this).show();
                if($value.length<1)
                {
                    $('ul#myUL li').hide();
                }
            }
        });



    });

    $('#header-search2').on('keyup',function(){

        let $value=$(this).val();
        if($value.length>2){
            let value = $(this).val().toLowerCase();
            $("ul#myUL2 li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        }

    });



    /****************scroll window */
    $(document).ready(function(){
        $(window).scroll(function(){
            if ($(window).scrollTop() > 600){
                $('#fixedBtns').css("display", "block");
                $('#fixedBtns').css("display", "flex");
            }
            if ($(window).scrollTop() < 600){
                $('#fixedBtns').css("display", "none");
            }
        });
    });




    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-171709819-1');
    let adroll_adv_id = "CV7BWKN2NJE2HPAR5IQS6R"; let adroll_pix_id = "BKQLMQXC25DP7B7QGV2DXO"; let adroll_version = "2.0"; (function(w, d, e, o, a) { w.__adroll_loaded = true; w.adroll = w.adroll || []; w.adroll.f = [ 'setProperties', 'identify', 'track' ]; let roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js"; for (a = 0; a < w.adroll.f.length; a++) { w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([ n, arguments ]) } })(w.adroll.f[a]) } e = d.createElement('script'); o = d.getElementsByTagName('script')[0]; e.async = 1; e.src = roundtripUrl; o.parentNode.insertBefore(e, o); })(window, document); adroll.track("pageView");







});
