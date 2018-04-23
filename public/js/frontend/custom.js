$("#slider3").sliderResponsive({
    hoverZoom: "off",
    hideDots: "on"
  });



  $(document).ready(function(){
    var pre = $('#dot-pre');
    var next = $('#dot-next');
    var b1 = $('#slide-box1');
    var b2 = $('#slide-box2');
      pre.click(function(){
        b1.hide();
        b2.slideDown(1500);
        next.removeClass('selected');
        pre.addClass('selected');
    });
    next.click(function(){
      b2.hide();
      b1.slideDown(1500);
      next.addClass('selected');
      pre.removeClass('selected');
    });
  });


  
// $(document).ready(function(){
//    $("#closevideo").youtube("play");  
// });



$(document).ready(function(){
  var url = $("#closevideo").attr('src');
  $("#myModal").on('hide.bs.modal', function(){
        $("#closevideo").attr('src', '');
        // alert('quan');
    });
   $("#myModal").on('show.bs.modal', function(){
        $("#closevideo").attr('src', url);
    });
});




