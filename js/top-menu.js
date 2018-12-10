$(document).ready(function() {
    $(window).scroll(function(){
        if(document.body.scrollTop > 1000)
            $('#top-menu').fadeIn( "slow", function() { });
        else    
            $('#top-menu').fadeOut( "slow", function() { });
    });
 
    $('#top-menu').click(function(){
        $('html, body').animate({scrollTop:0}, 100);
        return false;
    });
});