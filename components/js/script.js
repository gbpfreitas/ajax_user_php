$(function() {
    $(".navbar-toggler").on("click", function(e) {
        $(".gf-header").toggleClass("show");
        e.stopPropagation();
      });
    
      $("html").click(function(e) {
        var header = document.getElementById("gf-header");
    
        if (!header.contains(e.target)) {
          $(".gf-header").removeClass("show");
        }
      });
    
      $("#gf-nav .nav-link").click(function(e) {
        $(".gf-header").removeClass("show");
      });
});

$(document).ready(function(){
  $("#query").keyup(function(){
    var search = $(this).val();
    $.ajax({
      url: 'inc/Utilities/jsonHandle.php/test',
      type: 'POST',
      dataType: 'text',
      data: {search},
      success: function(result){
        console.log(result);
        $("#user").empty();
        $("#user").append(result);

      }
    });
  });
});