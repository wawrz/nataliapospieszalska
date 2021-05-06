function adjustStyle(height) {
    height = parseInt(height);
    if (height < 600) {
        $("#size-stylesheet").attr("href", "style/minimum.css");
    } else if ((height >= 600) && (height < 900)) {
        $("#size-stylesheet").attr("href", "style/medium.css");
    } else {
       $("#size-stylesheet").attr("href", "style/maximum.css"); 
    }
}

$(function() {
    adjustStyle($(this).height());
    $(window).resize(function() {
        adjustStyle($(this).height());
    });
});