




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

});
$(document).ready(function () {
$('#Carousel').carousel({
interval: 5000
})
});


      function setlang(val){
            if(val=='en'){
            var url=document.location.href
            url=url.replace('/ar','/en');
            url=url.replace('/ru','/en');
            document.location = url;      
                }else if(val=='ar'){
            var url=document.location.href
            url=url.replace('/en','/ar');
            url=url.replace('/ru','/ar');
            document.location = url;
               }else if(val=='ru'){
            var url=document.location.href
            url=url.replace('/en','/ru');
            url=url.replace('/ar','/ru');
            document.location = url;
              }
      }




// Accordian Action
  var action = 'click';
  var speed = "500";
  $(document).ready(function(){
  // Question handler
    $('li.q').on(action, function(){
      // gets next element
      // opens .a of selected question
      $(this).next().slideToggle(speed)
      // selects all other answers and slides up any open answer
      .siblings('li.a').slideUp();
      // Grab img from clicked question
      var img = $(this).children('span');
      // remove Rotate class from all images except the active
      $('span').not(img).removeClass('rotate');
      // toggle rotate class
      img.toggleClass('rotate');
    });

  });