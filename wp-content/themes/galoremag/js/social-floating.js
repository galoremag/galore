/*global Modernizr*/
$(document).ready(function(){
    var $window = $(window),
        $social_floating = $('#social-floating');
    window.setInterval(function checkScroll() {
        if($window.scrollTop() > 250){
            $social_floating.addClass("visible");
        } else{
            $social_floating.removeClass("visible");
        }
    }, 250);
});
