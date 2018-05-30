//var topofDiv = 40; //gets offset of header
$( document ).ready(function() {
  var height = $(".secondary-nav").css( "height" );

  $(window).scroll(function(){
      if($(window).scrollTop() > $(".secondary-nav").height()){
         $(".fixed-top").css("top", "0px");
         $(".navbar-circle").css("min-width", "150px");
         $(".navbar-circle").css("min-height", "150px");
      }
      else{
         $(".fixed-top").css("top", height);
         $(".navbar-circle").css("min-width", "200px");
         $(".navbar-circle").css("min-height", "200px");
      }
  });
});
