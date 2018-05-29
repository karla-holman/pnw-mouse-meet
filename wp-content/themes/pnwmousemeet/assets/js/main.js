//var topofDiv = 40; //gets offset of header
$( document ).ready(function() {
  var $main_nav = $(".main-nav").first(); //gets header
  var offset = $main_nav.offset();

  $(window).scroll(function(){
      if($(window).scrollTop() > offset.top){
         $(".fixed-top").css("top", "0px");
         $(".navbar-circle").css("min-width", "150px");
         $(".navbar-circle").css("min-height", "150px");
      }
      else{
         $(".fixed-top").css("top", offset.top + "px");
         $(".navbar-circle").css("min-width", "200px");
         $(".navbar-circle").css("min-height", "200px");
      }
  });
});
