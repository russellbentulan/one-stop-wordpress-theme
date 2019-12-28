$(function(){

	if($(window).width() > 980 ){
	     $(".menu-item-has-children > a").on("focus",function() {
	     	$(".active").removeClass("active");
	          $(this).parent().addClass("active");
	     });
  } else{
     $(".menu-item-has-children").on("click", function(){
        $(this).toggleClass('open').find(".sub-menu").slideToggle();
     })
  }

  $(".menu-button").on("click", function(){
     $(this).toggleClass("open");
     $(".menu").slideToggle();
  })

//   Resize function to close the mobile menu. Change MENU CONTAINER to navigation container of the theme
  var dwidth = $(window).width();

  $(window).on('resize', function() {
   if($(window).width() > 1200) {
      $(".menu ul").css('display', 'flex');
     } else {
      var wwidth = $(window).width();
      if(dwidth!==wwidth){
         dwidth = $(window).width();
         $(".menu ul").css('display', 'none');
         $('.menu-button').removeClass('open');
      }
     }
  });


// IE Check
   if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
      $('body').addClass('IE');
   }



});