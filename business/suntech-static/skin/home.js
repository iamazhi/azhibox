$(function(){
  $("#services [class^=cellBox] img").each(function(){
      var cellBox = $(this).parent().parent();
      var cell    = $(this).parent();
      var imgWidth  = cellBox.width() - parseInt(cell.css("padding-left")) - parseInt(cell.css("padding-right"));
      var imgHeight = cellBox.height() - parseInt(cell.css("padding-top")) - parseInt(cell.css("padding-bottom"));
      $(this).css({width: imgWidth, height: imgHeight});

      cellBox.hover(function(){
        $("#customBox2").css("z-index", "-1");
        $(this).addClass("mouseover");
        var newWidth  = $(this).width() * 1.2;
        var newHeight = $(this).height() * 1.2;
    		$(this).find("img").animate({"width": newWidth, "height": newHeight});
      },
      function(){
        $("#customBox2").css("z-index", "1");
        $(this).removeClass("mouseover");
   		  $(this).find("img").stop(true,true).animate({"width": imgWidth, "height": imgHeight});
      });
    });
})

