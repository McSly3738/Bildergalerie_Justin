$(document).ready(function(){
  $(".btn_Index").click(function() {
    console.log($(this));
    $("html, body").animate(
      { scrollTop: $(".search").offset().top
    }, 2000);
  });
});
