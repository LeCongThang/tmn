/**
 * Created by Hadesker on 16/08/2017.
 */
// set active class
$(document).ready(function(){
    var curURL = window.location.pathname;

    curURL = curURL.toLowerCase();

    // alert(curURL);

    $('.below-menu a').each(function(){
        // alert(this.pathname.toLowerCase());

        if(curURL.indexOf(this.pathname.toLowerCase()) >= 0 && this.pathname.length > 10)
        {
            $(this).parent().addClass('active');
            return false;
        }

        if(curURL +language == this.pathname.toLowerCase())
        {
            $('.below-menu li').first().addClass('active');
            return false;
        }

        if (curURL === this.pathname.toLowerCase())
        {
            $(this).parent().addClass('active');
            return false;
        }
    });
    $('.draw').click(function () {
        $('.below-menu li.active').removeClass('active');
        $(this).parent().addClass('active');
    });
});

